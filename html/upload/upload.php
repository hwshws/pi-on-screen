<html>
<header>
    <script type="text/javascript">
        //setTimeout(() => window.history.back(), 5000);
    </script>
</header>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/Berlin');
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/Classes/PHPExcel.php');
require_once(__ROOT__ . '/config.php');
$filename = $_GET['filename'];
$target_dir = "/opt/usb/"; // TEST
//$target_dir = "/homepages/38/d139650057/htdocs/";  //on Server
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = pathinfo($target_file, PATHINFO_EXTENSION);
$target_name = $target_dir . $filename . "." . $fileType;
if ($filename === null) {
    $uploadOk = 0;
}
if ($filename != "Geburtstage" && $filename != "Speiseplan") {
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if ($fileType != "xls" /*&& $fileType != "xlsx"*/) {
    //echo "FALSCH!";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, da ging was schief!";
// if everything is ok, try to parsing file
} else {
    $objReader = new PHPExcel_Reader_Excel5();
    $objReader->setReadDataOnly(true);
    $pdo = new PDO('mysql:host=localhost;dbname=usb', $user, $pass);
    if ($filename == "Speiseplan") {
        $objReader->setLoadSheetsOnly('Plan Mittag');
        $objPHPExcel = $objReader->load($_FILES["fileToUpload"]["tmp_name"]);
        $e1 = $objPHPExcel->getActiveSheet()->getCell('E1');
        $regex = '/\d{1,2}.\d{1,2}/s';
        preg_match_all($regex, $e1, $matches, PREG_SET_ORDER, 0);
        $start = $matches[0][0] . '.' . $matches[2][0];
        $ende = $matches[1][0] . '.' . $matches[2][0];
        $date = new DateTime($start);
        $colums = array('B', 'C', 'D', 'E', 'F');
        //$essen = array();
        $errors = array();
        $statement = $pdo->prepare("INSERT INTO mensa (Datum, Mittag, Vegetarisch, Nachtisch, Abend) 
            VALUES (:date, :Mittag, :Vegetarisch, :Nachtisch, :Abend) 
            ON DUPLICATE KEY UPDATE Mittag = :Mittag, Vegetarisch = :Vegetarisch, Nachtisch = :Nachtisch, Abend = :Abend");
        for ($i = 0; $i < 5; $i++) {
            $mittag = $objPHPExcel->getActiveSheet()->getCell($colums[$i] . '4')->getOldCalculatedValue();
            $vegetarisch = $objPHPExcel->getActiveSheet()->getCell($colums[$i] . '5')->getOldCalculatedValue();
            $nachtisch = $objPHPExcel->getActiveSheet()->getCell($colums[$i] . '6')->getOldCalculatedValue();
            $abend = $objPHPExcel->getActiveSheet()->getCell($colums[$i] . '10')->getOldCalculatedValue();
            //$essen[$date->format('d.m')] = array($mittag, $vegetarisch, $nachtisch, $abend);
            $statement->execute(array(":date" => $date->format('d.m.Y'), ":Mittag" => $mittag,
                ":Vegetarisch" => $vegetarisch, ":Nachtisch" => $nachtisch, ":Abend" => $abend));
            if ($statement->errorCode() != "00000") {
                array_push($errors, $statement->errorCode());
            }
            $date->modify('+1 day');
        }
        if (sizeof($errors) == 0) {
            echo "<h2>Update erfolgreich</h2>";
        } else {
            echo '<h2 style="color: red"> Ein Fehler ist aufgetreten </h2><p style="font-size: small">Fehler-Codes:' . var_dump($errors) . '</p> ';
        }
    } else if ($filename == "Geburtstage") {
        $errors = array();
        $objPHPExcel = $objReader->load($_FILES["fileToUpload"]["tmp_name"]);
        $i = 2;
        $statement = $pdo->prepare("INSERT INTO geb (Datum, Vorname, Nachname) VALUES (?,?,?)");
        while (true) {
            if ($objPHPExcel->getActiveSheet()->getCell('A' . $i)->getValue() == "") {
                break;
            }
            $dateTime = DateTime::createFromFormat('j/n/Y', $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getValue());
            $vorname =  $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getValue();
            $nachname =  $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getValue();
            $statement->execute(array($dateTime->format('d.m'), $vorname, $nachname));
            $i++;

            if ($statement->errorCode() != "00000") {
                array_push($errors, $statement->errorCode());
            }
        }

        if (sizeof($errors) == 0) {
            echo "<h2>Update erfolgreich</h2>";
        } else {
            echo '<h2 style="color: red"> Ein Fehler ist aufgetreten </h2><p style="font-size: small">Fehler-Codes:' . var_dump($errors) . '</p> ';
        }
    }
    $pdo = null;
}
?> <br><br>
<button onclick="window.history.back()">Zurück!</button>
