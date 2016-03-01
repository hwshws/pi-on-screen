<!DOCTYPE html>
<html lang="de">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title>USB - Urspringer Schwarzes Brett</title>

    <!-- Bootstrap-CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Besondere Stile für diese Vorlage -->
    <link href="css/sticky-footer.css" rel="stylesheet">


  </head>

  <body>
    <?php include 'header.inc.php'; ?> <br><br><br>

      <!-- Seiteninhalt -->
 <?php echo date("w"); //Ausgabe TAG in 0-7 ?> 
<div class="container-fluid">    
    <div class="row">
  <div class="col-md-8"><h2>Vertretungen, Stand XX:XX Uhr</h2><br>
  5. Klasse - D - PAV 1 - Lä<br>
  6. Klasse - E - PAV 1 - ELi <br>
  </div>
  <div class="col-md-4"><h2>Heute in der Mensa...</h2>
  Maultaschen an geschmeltzten Zwiebeln. <br> Vegetarische Maultaschen <br> Schokoladenpudding</div>
</div>
</div>
<div style="display:block; text-align:center;">
	<a style="text-decoration:none;border-style:none;color:black;font-size:36px" target="_blank" href="http://www.schnelle-online.info/Kalender.html" id="soidate191837822596">Kalender</a><br/><a style="text-decoration:none;border-style:none;color:black;" target="_blank" href="http://www.schnelle-online.info/Atomuhr-Uhrzeit.html" id="soitime191837822596">Atomuhr</a>
<script type="text/javascript">
SOI = (typeof(SOI) != 'undefined') ? SOI : {};(SOI.ac21fs = SOI.ac21fs || []).push(function() {
(new SOI.DateTimeService("191837822596", "DE")).appendTime(" Uhr").setDay2digits(true).setMonthMode(1).start();});
(function() {if (typeof(SOI.scrAc21) == "undefined") { SOI.scrAc21=document.createElement('script');SOI.scrAc21.type='text/javascript'; SOI.scrAc21.async=true;SOI.scrAc21.src=((document.location.protocol == 'https:') ? 'https://' : 'http://') + 'homepage-tools.schnelle-online.info/Homepage/atomicclock2_1.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(SOI.scrAc21, s);}})();
</script>
</div> 
<?php 
//$abfrage = "SELECT * FROM mensa";
$ergebnis = mysqli_query($db, $abfrage);
//$result = mysql_query("SELECT * FROM mensa");

//$ergebnis = mysqli_query($db, "SELECT url, urlname FROM links");
//echo($ergebnis);
?>

 <!-- <table width="100%" border="0" cellpadding="3" cellspacing="1"> 
        <tr><td width="140" align="right">*Teamname:</td><td align="left"><input type="text" name="teamname" value="" style="width:100%;" /></td></tr>
        <tr><td align="right">*Teamleader:</td><td align="left"><input type="text" name="teamleader" value="" style="width:100%" /></td></tr>
        <tr><td align="right">*Klasse:</td><td align="left"><input type="text" name="klasse" value="" style="width:100%" /></td></tr>
        <tr><td align="right">*E-Mail:</td><td align="left"><input type="text" name="email" value="" style="width:100%" /></td></tr>
        <tr><td align="right">Sonst noch was?:</td><td align="left"><input type="text" name="sonst" value="" style="width:100%" /></td></tr>
        <tr><td colspan="2" align="left" nowrap><br /><input type="reset" value="Formular l&ouml;schen" style="width:49%" />  <input type="submit" name="abschicken" value="Formular absenden" style="width:49%" /></td></tr>
        </table> -->
       <!-- Seite fertig -->   
      <?php include 'footer.inc.php'; ?>
  </body>

</html>
