<?php
date_default_timezone_set('CET');
$date = date('d' . '.' . 'm');
$row = 1;
if (($handle = fopen("/opt/usb/Geburtstage.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle)) !== FALSE) {
        if($date == $data[2]) {
            $alter = date('Y') - $data[3];
            echo $data[0] . " " . $data[1] . " (" . $alter . ")\n";
        }
    }
    fclose($handle);
}