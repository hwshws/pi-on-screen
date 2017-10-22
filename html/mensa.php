<?php
define('__ROOT__', dirname(__FILE__));
require(__ROOT__ . '/config.php');
$t = date("H");
$date = date('d.m.Y');
$pdo = new PDO('mysql:host=localhost;dbname=usb', $user, $pass);
if ($t > "14") {
    $row = $pdo->query('SELECT Abend from mensa WHERE Datum = ' . ';')->fetch();
    echo "<span style='font-weight: 600'>Abendessen:</span><br>";
    //$abendessen = file_get_contents('abend.txt');
    echo $row;
} else {
    $row = $pdo->query('SELECT Mittag from mensa WHERE Datum = ' . ';')->fetch();
    //$mittagessen = file_get_contents('mittag.txt');
    echo $mittagessen;
}
$pdo = null;
