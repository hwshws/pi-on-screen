<html>
<head>
    <meta charset="UTF-8">
</head>
<?php
define('__ROOT__', dirname(__FILE__));
require(__ROOT__ . '/config.php');
$pdo = new PDO('mysql:host=localhost;dbname=usb', $user, $pass);
echo $pdo->query('SELECT Nachricht from Informationen ORDER BY timestamp DESC LIMIT 1;')->fetch()[0];
$pdo = null;