  <?php

  // Platzhalter für Grundgerüst
  $array = file("zitat.txt");

  $test = count(file("zitat.txt")); //Zählt Zeilen in Datei (auch leere am Ende!)
  $zahl = $test - 2;  // Darum kommt da jetzt eine weg!
  $a = rand(0, $zahl); // rand von 0 - zahl
  if (($a % 2) == 1)
  {  ; //echo "$a is odd."
  $a = $a + 1;}
  if (($a % 2) == 0)
  { ;} //echo "$a is even."
  //echo "<div class="panel-body" id="zitat"><h4><b>";
  //echo $array[$a]; // Auslesen der Zeile Nummer $a
  $zeile1 = $array[$a]; //Zitat
  $filename = "zitatdestages.txt";
  file_put_contents($filename, $zeile1); // XXX: Lese-/Schreibrechte überprüfen!
  echo $zeile1;
  echo "<br>"; // Platzhalter für Gerüst
  $a = $a + 1; // Erhöhen $a um 1
  $zeile2 = $array[$a]; //Autor
  $filename = "autordestages.txt";
  file_put_contents($filename, $zeile2); // XXX: Lese-/Schreibrechte überprüfen!
  echo "<i>&#126; $zeile2</i>";
  //echo "</div><div class="panel-footer"><i>&#126; $zeile2</i></b><h4></div>";
  //echo $array[$a]; // Auslesen der Zeile Nummer $a (+1)
  //"<br>";
  //TODO: jede Variable in die richtige Datei schreiben. Dabei den bestehenden Inhalt löschen!
  echo "<br>"; // Platzhalter für Gerüst
  //echo "<b>Ende</b>"; // Rein informativ
  // Platzhalter für Grundgerüst
  ?>
