<html>
<head>
    <meta charset="UTF-8">
</head>
<?php
define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__ . '/config.php');
$date = date('N');
if ($date != 5 || 4) {
    return;
}
$array = array();
$pdo = new PDO('mysql:host=localhost;dbname=usb', $user, $pass);
foreach ($pdo->query('SELECT * FROM dienst LIMIT 1') as $row) {
    array_push($array, $row["klasse"]);
}
if (count($array) > 0) {
    echo '<div class="panel panel-success">';
    echo '<div class="panel-heading"><h4><b> Geländedienst </b></h4></div>';
    echo '<div class="panel-body">';
    foreach ($array as $i => $value) {
        echo '<h4 style="margin: 6px 0 2px;">' . $array[$i] . '</h4>';
    }
    echo '</div></div>';
}