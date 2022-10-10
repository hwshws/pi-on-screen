<?php
define('__ROOT__', dirname(__FILE__));
require(__ROOT__ . '/config.php');
$date = date('Y-m-d');
$pdo = new PDO('mysql:host=localhost;dbname=usb', $user, $pass);

$result = $pdo->query('SELECT * FROM mensa WHERE Datum = "' . $date . '" LIMIT 1;');
$row = $result->fetch();

if (!$row) {
	echo "Bitte Aushang beachten!";
} else {
	if (date("H") > "14") {
		echo $row["Abend"] . '<br>';
	} else {
		echo $row["Mittagessen"] . '<br>';
		echo $row["Vegetarisch"] . '<br>';
		echo $row["Nachtisch"] . '<br>';
	}
}

$pdo = null; ?>
