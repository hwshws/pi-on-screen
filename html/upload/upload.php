<html>
<header>
    <meta charset="UTF-8">
    <script type="text/javascript">
        //setTimeout(() => window.history.back(), 5000);
    </script>
</header>
<body>
<?php
if ($_POST['password'] == 'Achtopf') {
    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__ . '/Classes/PHPExcel.php');
    require_once(__ROOT__ . '/config.php');
    $filename = $_GET['filename'];
    //$target_dir = "/opt/usb/"; // TEST
    $target_dir = "/subdomains/comenius/httpdocs/usb/upload";  //on Server
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $target_name = $target_dir . $filename . "." . $fileType;
    if ($filename === null) {
        $uploadOk = 0;
        echo "Zeile 22";
    }
    if ($filename != "Geburtstage" && $filename != "Speiseplan") {
        $uploadOk = 0;
        echo "Zeile 26";
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($fileType != "xls" /*&& $fileType != "xlsx"*/) {
        echo "Filetype FALSCH! 36";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0 && $filename == "Dienst") {
        $pdo = new PDO('mysql:host=localhost;dbname=usb', $user, $pass);
        $statement = $pdo->prepare("UPDATE dienst SET klasse = ?");
        $statement->execute(str_split($_POST['klasse'], 999));
        if ($statement->errorCode() != "00000") {
            echo "Error:";
            echo $statement->errorCode();
            echo '<br>';
            $statement->debugDumpParams();
            echo '<br>';
        } else {
            echo "Update erfolgreich";
        }
    } else if ($uploadOk == 0 && $filename != "Text") {
        echo "Sorry, da ging was schief! Test und so.";
// if everything is ok, try to parsing file
    } else {
        $objReader = new PHPExcel_Reader_Excel5();
        $objReader->setReadDataOnly(true);
        $pdo = new PDO('mysql:host=localhost;dbname=usb', $user, $pass);
        if ($filename == "Speiseplan") {
            $objPHPExcel = $objReader->load($_FILES["fileToUpload"]["tmp_name"]);
            $objPHPExcel->setActiveSheetIndex(1);
            $date = DateTime::createFromFormat($format = 'Y-m-d', $_POST['start']);
            $colums = array('B', 'C', 'D', 'E', 'F');
            $errors = array();
            $statement = $pdo->prepare("INSERT INTO mensa (Datum, Mittagessen, Vegetarisch, Nachtisch, Abend) 
            VALUES (:Datum, :Mittagessen, :Vegetarisch, :Nachtisch, :Abend) 
            ON DUPLICATE KEY UPDATE Mittagessen = :Mittagessen, Vegetarisch = :Vegetarisch, Nachtisch = :Nachtisch, Abend = :Abend");
            for ($i = 0; $i < 5; $i++) {
                $mittag = $objPHPExcel->getActiveSheet()->getCell($colums[$i] . '4')->getCalculatedValue();
                $vegetarisch = $objPHPExcel->getActiveSheet()->getCell($colums[$i] . '5')->getCalculatedValue();
                if ($vegetarisch === NULL) {
                   $vegetarisch = $mittag;
                   echo nl2br("Dienstag Vegi ".$vegetarisch."\n ");
                   //echo "Dienstag";
                   echo $mittag;
                   //echo $vegetarisch;
                }
                $nachtisch = $objPHPExcel->getActiveSheet()->getCell($colums[$i] . '7')->getCalculatedValue();//ex 7
                $abend = $objPHPExcel->getActiveSheet()->getCell($colums[$i] . '13')->getCalculatedValue(); //ex 13
                //$essen[$date->format('d.m')] = array($mittag, $vegetarisch, $nachtisch, $abend);
                //var_dump($objPHPExcel->getActiveSheet()->getCell($colums[$i] . '4')); echo '<br>';
                $values = array(":Datum" => $date->format('d.m.Y'), ":Mittagessen" => $mittag,
                    ":Vegetarisch" => $vegetarisch, ":Nachtisch" => $nachtisch, ":Abend" => $abend);
                $statement->execute($values);
                if ($statement->errorCode() != "00000") {
                    array_push($errors, $statement->errorCode());
                    $statement->debugDumpParams();
                    echo '<br>';
                    var_dump($values);
                    echo '<br>';
                }
                $date->modify('+1 day');
            }
            if (sizeof($errors) == 0) {
                echo "<h2>Update erfolgreich</h2>";
            } else {
                echo '<h2 style="color: red"> Ein Fehler ist aufgetreten </h2><p style="font-size: small">Fehler-Codes:';
                foreach ($errors as $error) {
                    echo $error . ' ';
                }
                echo '</p> ';
            }
        } else if ($filename == "Geburtstage") {
            $errors = array();
            $objPHPExcel = $objReader->load($_FILES["fileToUpload"]["tmp_name"]);
            $i = 2;
            $statement = $pdo->prepare("INSERT INTO geb (Datum, Vorname, Nachname) VALUES (:datum,:vorname,:nachname) ON DUPLICATE KEY UPDATE Datum = :Datum");
            while (true) {
                if ($objPHPExcel->getActiveSheet()->getCell('A' . $i)->getValue() == "") {
                    break;
                }
                $date = date($format = 'd.m', PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCell('C' . $i)->getValue()));
                $vorname = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getValue();
                $nachname = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getValue();
                $statement->execute(array(":datum" => $date, ":vorname" => $vorname, ":nachname" => $nachname));
                $i++;

                if ($statement->errorCode() != "00000") {
                    array_push($errors, $statement->errorCode());
                }
            }

            if (sizeof($errors) == 0) {
                echo "<h2>Update erfolgreich</h2>";
            } else {
                echo '<h2 style="color: red"> Ein Fehler ist aufgetreten </h2><p style="font-size: small">Fehler-Codes:';
                foreach ($errors as $error) {
                    echo $error . ' ';
                }
                echo '</p> ';
            }
        } else if ($filename == "Text") {
            $statement = $pdo->prepare("INSERT INTO Informationen (Nachricht, Name) VALUES (:Nachricht,:Name)");
            $statement->execute(array(":Nachricht" => $_POST['info'], ":Name" => $_POST['name']));
            if ($statement->errorCode() != "00000") {
                echo '<h2 style="color: red"> Ein Fehler ist aufgetreten </h2><p style="font-size: small">Fehler-Code:' . $statement->errorCode();
            } else {
                echo "<p>Danke - Ihre Daten wurden gespeichert</p>";
            }
        } else echo "Sorry, da ging was schief!";
        $pdo = null;
    }
} else {
    echo '<h2 style="color: red">Falsches Passwort!</h2>';
}
?> <br><br>
<button onclick="window.history.back()">Zurück!</button>
