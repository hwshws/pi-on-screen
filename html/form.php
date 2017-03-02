<!DOCTYPE html>

<!--html manifest="this.appcache"-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
        <meta name="description" content="Das Urspringer Schwarze Brett - Backend">
        <meta name="author" content="HWS">
        <title>Frontend-USB-füttern</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <p class="lead">Willkommen in der Konfiguration für das Urspringer Schwarze Brett. <i>(USB)</i><br>
    Die Nutzung sollte selbsterklärend sein.</p>


<form class="form-horizontal" method="post" action="ausw.php">
<fieldset>

<!-- Form Name -->
<legend>Urspringer Schwarzes Brett</legend>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Anzeige Schwarzes Brett</label>
  <div class="col-md-4">
  <input id="textinput" name="info" placeholder="Füll mich!" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Autor</label>
  <div class="col-md-4">
  <input id="name" name="name" placeholder="Autor eingeben" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="send">Abschicken</label>
  <div class="col-md-4">
    <button id="send" name="send" class="btn btn-info">Senden</button>
  </div>
</div>
</fieldset>
</form>
<?php
$lines = file ('hws.txt');
$letzte_zeile = $lines[count($lines)-1];

// rsort($lines);
 //for($i = 0; $i < 20; $i++) {
 //echo nl2br($lines[$i]);
//}

echo '<i><span style="color:red; font-size: 30px;">'.'Aktuell zu sehen:<br />' ."\n".'</i></span>';
//echo 'Aktuell zu sehen:<br />' ."\n";
$message = file_get_contents('message.txt');
echo nl2br($message);

//echo 'Die letzten Einträge:<br />' ."\n";

//echo date("d.m.Y-H:i:s ") . "\n";
//include 'hws.txt';


 ?>
<!-- JavaScript goes last for the page to load faster -->
<script type="application/javascript" src="js/jquery.min.js"></script>
<script type="application/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
