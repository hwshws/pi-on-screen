<html>
<head>
    <meta charset="UTF-8">
</head>
<?php
define('__ROOT__', dirname(__FILE__));
require(__ROOT__ . '/config.php');
$date = date('d.m.Y');
$pdo = new PDO('mysql:host=localhost;dbname=usb', $user, $pass);
if (date("H") > "14") {
    $row = $pdo->query('SELECT Abend from mensa WHERE Datum = "' . $date . '" LIMIT 1;')->fetch();
    echo "<span style='font-weight: 600'>Abendessen:</span><br>";
    echo $row[0];
} else {
    $row = $pdo->query('SELECT Mittagessen from mensa WHERE Datum = "' . $date . '" LIMIT 1;')->fetch();
    echo $row[0];
}
$pdo = null;
