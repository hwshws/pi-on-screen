<?php
$t = date("H"); // Hinweis: Der Cronjob sollte laufen!
 if ($t <= "07" or $t >= "18") {
    echo "<i>Schlafen</i><br>";
$message = file_get_contents('message.txt'); echo $message;
 } else {
$ch = curl_init("http://www.h-ws.de/message.txt");
$zieldatei = fopen("message.txt", "w");

curl_setopt($ch, CURLOPT_FILE, $zieldatei);
curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
curl_exec($ch);
fclose($zieldatei);
$message = file_get_contents('message.txt'); echo $message;
   echo "Im Dienst";
 }
 ?>
