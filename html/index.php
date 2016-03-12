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
  </head>
  <body>
    <?php include 'header.inc.php'; ?> <br><br><br>

      <!-- Seiteninhalt -->
<!-- <?php echo date("w"); //Ausgabe TAG in 0-7 ?> -->
<div class="container-fluid">
    <div class="row">
  <div class="col-md-8"><h2>Vertretungen</h2><br> <?php //TODO: vplan.txt auslesen und verarbeiten ?>
    <h4>
       <?php  // Modul V-Plan
$vplan = file_get_contents('vplan.txt');
echo $vplan
    ?> </h4>
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
<div style="display:block; text-align:center;">
	<a style="text-decoration:none;border-style:none;color:black;font-size:36px" target="_blank" href="http://www.schnelle-online.info/Kalender.html" id="soidate191837822596">Kalender</a><br/><a style="text-decoration:none;border-style:none;color:black;" target="_blank" href="http://www.schnelle-online.info/Atomuhr-Uhrzeit.html" id="soitime191837822596">Atomuhr</a>
<script type="text/javascript"> <?php //Uhrzeit. Braucht Inet-Zugriff ?>
SOI = (typeof(SOI) != 'undefined') ? SOI : {};(SOI.ac21fs = SOI.ac21fs || []).push(function() {
(new SOI.DateTimeService("191837822596", "DE")).appendTime(" Uhr").setDay2digits(true).setMonthMode(1).start();});
(function() {if (typeof(SOI.scrAc21) == "undefined") { SOI.scrAc21=document.createElement('script');SOI.scrAc21.type='text/javascript'; SOI.scrAc21.async=true;SOI.scrAc21.src=((document.location.protocol == 'https:') ? 'https://' : 'http://') + 'homepage-tools.schnelle-online.info/Homepage/atomicclock2_1.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(SOI.scrAc21, s);}})();
</script>
<!-- START SHORTNEWS TICKER -->
<script type="text/javascript">
var tickerwidth = 923;
var tickercolor = "#DDDDDD";
var fontcolor = "#000000";
var splitcolor = "#043971";
var fontsize = 18;
var visitedlink = "#ffffff";
var rollovercolor = "#990000";
var font = "Arial";
var speed = 1;
var sparte = 4;
var rubrik = 13;
var rollover_underline = 0;
var font_underline = 0;
var transparent = 1;
var fontbold = 0;
var tickertyp = 1;
var u_id = 93697;
</script>
<table cellspacing="0" cellpadding="0" width="950"><tr><td width="27" style="background-color:transparent"><a target="ShortNews" href="http://www.ShortNews.de" style="padding:0; margin:0;"><img alt="SN" title="Newsticker powered by www.ShortNews.de" src="http://newsticker.shortnews.de/sn_icon_20.gif" border="0" /></a></td><td><script type="text/javascript" src="http://newsticker.shortnews.de/de/js/free/3/a.js?1"></script></td></tr></table>
<!-- END SHORTNEWS TICKER -->

</div>
       <!-- Seite fertig -->
      <?php include 'footer.inc.php'; ?>
  </body>
</html>
