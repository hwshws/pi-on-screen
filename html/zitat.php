  <?php
// Wählt zufällig ein Zitat des Tages aus der Datei zitat.txt aus, und schreibt das ausgewählte Zitat in .txt Dateien.
  $array = file("zitat.txt");
  $test = count(file("zitat.txt")); //Zählt Zeilen in Datei (auch leere am Ende!)
  $zahl = $test - 2;  // Darum kommt da jetzt eine weg!
  $a = rand(0, $zahl); // rand von 0 - zahl
  if (($a % 2) == 1)
  {  ;
  $a = $a + 1;}
  if (($a % 2) == 0)
  { ;}
  //echo $array[$a]; // Auslesen der Zeile Nummer $a //XXX: Bleibt für Debugging
  $zeile1 = $array[$a]; //Zitat
  $filename = "zitatdestages.txt";
  file_put_contents($filename, $zeile1); // XXX: Lese-/Schreibrechte überprüfen!
  //echo $zeile1; //XXX: Bleibt für Debugging
  //echo "<br>"; //XXX: Bleibt für Debugging
  $a = $a + 1; // Erhöhen $a um 1
  $zeile2 = $array[$a]; //Autor
  $filename = "autordestages.txt";
  file_put_contents($filename, $zeile2); // XXX: Lese-/Schreibrechte überprüfen!
  //echo "<i>&#126; $zeile2</i>"; //XXX: Bleibt für Debugging
  //echo "<br>"; // Platzhalter für Gerüst //XXX: Bleibt für Debugging
  ?>
