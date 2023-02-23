<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

define('__ROOT__', dirname(dirname(__FILE__)));
require_once __ROOT__ . '/vendor/autoload.php';
?>
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
    require_once(__ROOT__ . '/config.php');
    $filename = $_GET['filename'];
    //$target_dir = "/opt/usb/"; // TEST
    $target_dir = "/subdomains/comenius/httpdocs/usb/upload";  //on Server
    $uploadOk = 1;
    if ($filename === null) {
        $uploadOk = 0;
        echo "Zeile 22";
    }
    if ($filename != "Geburtstage" && $filename != "Speiseplan") {
        $uploadOk = 0;
//        echo "Zeile 26";
    }
// Check file size
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($filename == "Speiseplan") {
        if (!isset($_FILES["fileToUpload"])) {
            echo "Die Datei ist nicht vorhanden!";
            $uploadOk = 0;
        }
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
        if ($fileType != "xls" && $fileType != "xlsx") {
//        echo "Filetype FALSCH! 36";
            $uploadOk = 0;
        }
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
        if (isset($_FILES["fileToUpload"])) {
            $pdo = new PDO('mysql:host=localhost;dbname=usb', $user, $pass);
            $reader = new Xlsx();
            $spreadsheet = null;
            if ($reader->canRead($_FILES["fileToUpload"]["tmp_name"])){
                try {
                    $spreadsheet = $reader->load($_FILES["fileToUpload"]["tmp_name"]);
                    $spreadsheet->setActiveSheetIndex(0);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    echo($e->getMessage()."<br>");
                    die("Es gab einen Internen Fehler! E-001");
                } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
                    echo($e->getMessage()."<br>");
                    die("Es gab einen Internen Fehler! E-002");
                }
            }
        }

        $pdo = new PDO('mysql:host=localhost;dbname=usb', $user, $pass);
        if ($filename == "Speiseplan") {
            $date = DateTime::createFromFormat($format = 'Y-m-d', $_POST['start']);
	    if (!$date) {
		$date = DateTime::createFromFormat($format = 'd.m.Y', $_POST['start']);
	    }
            $colums = array('B', 'C', 'D', 'E', 'F');
            $errors = array();
            $statement = $pdo->prepare("INSERT INTO mensa (Datum, Mittagessen, Vegetarisch, Nachtisch, Abend) 
            VALUES (:Datum, :Mittagessen, :Vegetarisch, :Nachtisch, :Abend) 
            ON DUPLICATE KEY UPDATE Mittagessen = :Mittagessen, Vegetarisch = :Vegetarisch, Nachtisch = :Nachtisch, Abend = :Abend");
            for ($i = 0; $i < 5; $i++) {
                $mittag = $spreadsheet->getActiveSheet()->getCell($colums[$i] . '4')->getCalculatedValue();
                $vegetarisch = $spreadsheet->getActiveSheet()->getCell($colums[$i] . '5')->getCalculatedValue();
                if ($vegetarisch === NULL) {
                   $vegetarisch = $mittag;
                   echo nl2br("Dienstag Vegi ".$vegetarisch."\n ");
                   //echo "Dienstag";
                   echo $mittag;
                   //echo $vegetarisch;
                }
                $nachtisch = $spreadsheet->getActiveSheet()->getCell($colums[$i] . '6')->getCalculatedValue();//ex 7
                $abend = $spreadsheet->getActiveSheet()->getCell($colums[$i] . '8')->getCalculatedValue(); //ex 13
                //$essen[$date->format('d.m')] = array($mittag, $vegetarisch, $nachtisch, $abend);
                //var_dump($spreadsheet->getActiveSheet()->getCell($colums[$i] . '4')); echo '<br>';
                $arrValues = [
					":Datum" => $date->format('Y-m-d'),
					":Mittagessen" => $mittag ?? "- Unbekannt -",
					":Vegetarisch" => $vegetarisch ?? "- Unbekannt -",
					":Nachtisch" => $nachtisch ?? "- Unbekannt -",
					":Abend" => $abend ?? "- Unbekannt -"
				];
                $statement->execute($arrValues);
                if ($statement->errorCode() != "00000") {
                    array_push($errors, $statement->errorCode());
                    $statement->debugDumpParams();
                    echo '<br>';
                    var_dump($arrValues);
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
            $i = 2;
            $statement = $pdo->prepare("INSERT INTO geb (Datum, Vorname, Nachname) VALUES (:datum,:vorname,:nachname) ON DUPLICATE KEY UPDATE Datum = :Datum");
            while (true) {
                if ($spreadsheet->getActiveSheet()->getCell('A' . $i)->getValue() == "") {
                    break;
                }
                $date = date($format = 'd.m', $spreadsheet->getActiveSheet()->getCell('C' . $i)->getValue());
                $vorname = $spreadsheet->getActiveSheet()->getCell('B' . $i)->getValue();
                $nachname = $spreadsheet->getActiveSheet()->getCell('A' . $i)->getValue();
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
