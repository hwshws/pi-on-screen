<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <meta name="description" content="Das Urspringer Schwarze Brett - nur zum internen Gebrauch">
    <meta name="author" content="HWS">
    <meta http-equiv="refresh" content="600; URL=http://127.0.0.1" />   <!-- FIXME: Ändern bei Onlinestellung -->
    <title>USB - Urspringer Schwarzes Brett</title>
    <!-- Bootstrap-CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Besondere Stile für diese Vorlage -->
    <link href="css/sticky-footer.css" rel="stylesheet">
    <style type="text/css">
<!--

/* CSS für JS Uhr */

#ZeitBox01 {
position: relative;
top: 0px;
left: 0px;
width: 400px;
height: 150px;
margin: 0px;
padding: 0px;
border: none;
background-color: #FFFFFF;
}

#ZeitAnzeige {
position: absolute;
top: 0px;
left: 0px;
background: transparent;
width: 500px;
line-height: 26px;
text-align: center;
color: #000000;
font-family: Verdana,Arial,Helvetica,sans-serif;
font-size: 32px;
font-weight: normal;
}

-->
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
 var DatumJetzt = CounterTag2 + CounterTag + CounterMonat2 + CounterMonat  + "." + CounterJahr + "<br>";

 // aktuelle Zeit
 var ZeitJetzt = CounterStd2 + CounterStd + CounterMin2 + CounterMin + CounterSek2 + CounterSek + " Uhr";

// Option hier eintragen 1,2,3 oder 4
DarstellungOption = 4

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
    var DispString = Wochentag[TagDerWoche] + ", " + DatumJetzt + "<br>" + ZeitJetzt;
    break;
    }

document.getElementById("ZeitAnzeige").innerHTML = DispString;

setTimeout("DisplayTime()", 1000);
}

window.setTimeout('DisplayTime()',1000);

// -->
</script>
  </head>
  <body>
    <?php include 'header.inc.php'; ?>

      <!-- Seiteninhalt -->
<!-- <?php echo date("w"); //Ausgabe TAG in 0-7 ?> -->
<div class="container-fluid">
    <div class="row">
  <div class="col-md-8"><h2>Vertretungen</h2> 
    <h3>
       <?php  // Modul V-Plan
$vplan = file_get_contents('vplan.txt');
echo $vplan
    ?> </h3>
  </div>
<div class="col-md-4"><h2>Heute in der Mensa...</h2>
  <h3> <?php  // Modul Mensa - Lecker lecker
  $array = file("mensa.txt");
  $test = count(file("mensa.txt")); //FIXME: Jede Woche aktuallisieren
  echo $array[date("w")];
  ?> </h3>
</div>
</div>
</div>
<p align="right"><img src="logo.jpg" alt="Logo der Urspringschule" class="pull-right"></p> <!-- Nettes Urspringlogo -->
<div style="display:block; text-align:center;"> <br>
<center><div id="ZeitBox01"><div id="ZeitAnzeige"></div></div>  <!-- Uhrzeit aus dem Header -->
<!-- START SHORTNEWS TICKER -->
<script type="text/javascript">
var tickerwidth = 923;
var tickercolor = "#DDDDDD";
var fontcolor = "#000000";
var splitcolor = "#043971";
var fontsize = 20;
var visitedlink = "#ffffff";
var rollovercolor = "#990000";
var font = "Arial";
var speed = 1;
var sparte = 4;
var rubrik = 13;
var rollover_underline = 1;
var font_underline = 0;
var transparent = 1;
var fontbold = 0;
var tickertyp = 1;
var u_id = 93697;
</script>
<table cellspacing="0" cellpadding="0" width="950"><tr><td width="27" style="background-color:#DDDDDD"><a target="ShortNews" href="http://www.ShortNews.de" style="padding:0; margin:0;"><img alt="SN" title="Newsticker powered by www.ShortNews.de" src="http://newsticker.shortnews.de/sn_icon_20.gif" border="0" /></a></td><td><script type="text/javascript" src="http://newsticker.shortnews.de/de/js/free/3/a.js?1"></script></td></tr></table>
<!-- END SHORTNEWS TICKER -->
</center>


</div>
       <!-- Seite fertig -->
      <?php include 'footer.inc.php'; ?>
  </body>
</html>
