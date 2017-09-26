<?php
date_default_timezone_set('Europe/Berlin');
$date = date('d' . '.' . 'm');
$array = array();
if (($handle = fopen("/opt/usb/Geburtstage.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle)) !== FALSE) {
        //data Vorname Nachname Geburtstag Geburtsjahr
        if ($date == $data[2]) {
            $alter = date('Y') - $data[3];
            $entry = $data[0] . " " . $data[1] . " (" . $alter . ")";
            array_push($array, $entry);
        }
    }
    fclose($handle);
}
if (count($array) > 0) {
    echo '<div class="panel panel-success">';
    echo '<div class="panel-heading"><h4><b> Geburtstage </b></h4></div>';
    echo '<div class="panel-body">';
    foreach ($array as $i => $value) {
        echo '<h3 style="margin: 6px 0 2px;">' . $array[$i] . '</h3>';
    }
    echo '</div></div>';
}
