<?php  // Modul Mensa - Lecker lecker
                        //  count(file("mensa.txt"));
                          $date =  date("j"); //Nummer des Tages - ohne führende 0
                          echo $date;
                          $test = count(file("mensa.txt")); // Datei Zeilen zählen
                          echo $test;
                          $ablauf = file_put_contents(mensa.txt, $test); // letzte Zeile in Variable schreiben
                          echo $ablauf;
                          if ($date == $ablauf) { // if-Abfrage
                          echo "<i>Bitte Aushang beachten.</i><br>";
                          }
                          else {;} // Ignorieren
                         $t = date("H"); // t in h
                          if ($t > "14") {
                              echo "<i>Abendessen:</i><br>";
                              $array = file("mensaa.txt");
                              $test = count(file("mensaa.txt"));
                              echo $array[date("w")];
                          } else {
                            //  echo "Mittagessen!";
                              $array = file("mensa.txt");
                              $test = count(file("mensa.txt"));
                              echo $array[date("w")];
                          }
                          ?> <!-- /SPEISEPLAN -->
<?php /*
count(file("mensa.txt"));
$date =  date("j"); //Nummer des Tages - ohne führende 0
$test = count(file("mensa.txt")); // Datei Zeilen zählen
$ablauf = file_put_contents(mensa.txt, $test); // letzte Zeile in Variable schreiben
if ($date == $ablauf) { // if-Abfrage
echo "<i>Bitte Aushang beachten.</i><br>";
}
else {;} // Ignorieren */
?>
