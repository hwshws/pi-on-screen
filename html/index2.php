<!DOCTYPE html>
<html lang="de">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <meta name="description" content="">
    <meta name="author" content="">
    <style type="text/css">


    /* Positionsbestimmung + Größe des Anzeigebereichs */

    #ZeitBox01 {
    position: relative;
    top: 0px;
    left: 0px;
    width: 200px;
    height: 26px;
    margin: 0px;
    padding: 0px;
    border: none;
    background-color: #0070C0;
    }

    #ZeitAnzeige {
    position: absolute;
    top: 0px;
    left: 0px;
    background: transparent;
    width: 200px;
    line-height: 26px;
    text-align: center;
    color: #FFFFFF;
    font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 12px;
    font-weight: normal;
    }
    </style>


    <script type="text/javascript" language="JavaScript">
    <!-- Begin

    // Array Wochentag
    Wochentag = new Array("Sonntag","Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag");


    // Funktionen für Anzeigen Tag Datum + dynamische Uhrzeit

    function DisplayTime()
    {
     var SystemDatum = new Date();
     var CounterTag = SystemDatum.getDate();
     var CounterMonat = SystemDatum.getMonth() + 1;
     var CounterJahr = SystemDatum.getFullYear();
     var CounterStd = SystemDatum.getHours();
     var CounterMin = SystemDatum.getMinutes();
     var CounterSek = SystemDatum.getSeconds();
     var TagDerWoche = SystemDatum.getDay();

     //  für zweistellige Anzeige
     var CounterTag2  = ((CounterTag < 10) ? "0" : "");
     var CounterMonat2  = ((CounterMonat < 10) ? ".0" : ".");
     var CounterStd2  = ((CounterStd < 10) ? "0" : "");
     var CounterMin2  = ((CounterMin < 10) ? ":0" : ":");
     var CounterSek2  = ((CounterSek < 10) ? ":0" : ":");


     // Die 3 Fragmente für die Anzeige Wochentag Datum Zeit

     // aktuelles Datum
     var DatumJetzt = CounterTag2 + CounterTag + CounterMonat2 + CounterMonat  + "." + CounterJahr;

     // aktuelle Zeit
     var ZeitJetzt = CounterStd2 + CounterStd + CounterMin2 + CounterMin + CounterSek2 + CounterSek + " Uhr";

    // Option hier eintragen 1,2,3 oder 4
    DarstellungOption = 3

    switch (DarstellungOption) {
      case 1:
        // Anzeige der Zeit
        var DispString = ZeitJetzt;
        break;
      case 2:
        // Anzeige Datum + Zeit
        var DispString = DatumJetzt + " &nbsp;" + ZeitJetzt;
        break;
      case 3:
        // Anzeige Wochentag + Zeit
        var DispString = Wochentag[TagDerWoche] + " &nbsp;" + ZeitJetzt;
        break;
      case 4:
        // Anzeige Wochentag + Datum + Zeit
        var DispString = Wochentag[TagDerWoche] + " " + DatumJetzt + " &nbsp;" + ZeitJetzt;
        break;
        }

    document.getElementById("ZeitAnzeige").innerHTML = DispString;

    setTimeout("DisplayTime()", 1000);
    }

    window.setTimeout('DisplayTime()',1000);

    // -->
    </script>

    <title>USB - Urspringer Schwarzes Brett</title>

    <!-- Bootstrap-CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Besondere Stile für diese Vorlage -->
    <link href="css/sticky-footer.css" rel="stylesheet">


  </head>

  <body>
    <?php include 'header.inc.php'; ?> <br><br><br>

      <!-- Seiteninhalt -->
 <?php echo date("w"); //"<br />" //Ausgabe TAG in 0-7


// $pdo = new PDO('mysql:host=localhost;dbname=usb', 'root', 'rico');

//$sql = "SELECT * FROM mensa";
//foreach ($pdo->query($sql) as $row) {
  // echo $row['M1']."  ".$row['M2']."<br />";
//   echo $row['NT']."<br /><br />";
//}

<div id="ZeitBox01"><div id="ZeitAnzeige"></div></div>


$array = file("mensa.txt");
$test = count(file("mensa.txt"));
echo $array[date("w")];


?>
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
       <!-- Seite fertig -->
      <?php include 'footer.inc.php'; ?>
  </body>

</html>
