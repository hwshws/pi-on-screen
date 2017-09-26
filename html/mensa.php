<?php
$t = date("H"); // Hinweis: Der Cronjob sollte laufen!
if ($t > "14") {
    echo "<span style='font-weight: 600'>Abendessen:</span><br>";
    $abendessen = file_get_contents('abend.txt');
    echo $abendessen;
} else {
    $mittagessen = file_get_contents('mittag.txt');
    echo $mittagessen;
}
?>
