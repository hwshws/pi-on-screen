<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <meta name="description" content="Das Urspringer Schwarze Brett - nur zum internen Gebrauch">
    <meta name="author" content="HWS">
    <meta http-equiv="refresh" content="1800; URL=http://127.0.0.1" />   <!-- FIXME: Ändern bei Onlinestellung -->
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
background-color: #81F781 ;
}

#ZeitAnzeige {
position: absolute;
top: 30px;
left: -44px;
background: transparent;
width: 500px;
line-height: 26px;
text-align: center;
color: #000000;
font-family: Verdana,Arial,Helvetica,sans-serif;
font-size: 32px;
font-weight: normal;
}
body {
  font-family: "Lato", sans-serif;
}

background: rgb(216,0,14);
background: -moz-linear-gradient(-45deg,  rgba(216,0,14,1) 0%, rgba(244,2,18,1) 55%, rgba(252,22,38,1) 100%);
background: -webkit-linear-gradient(-45deg,  rgba(216,0,14,1) 0%,rgba(244,2,18,1) 55%,rgba(252,22,38,1) 100%);
background: linear-gradient(135deg,  rgba(216,0,14,1) 0%,rgba(244,2,18,1) 55%,rgba(252,22,38,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d8000e', endColorstr='#fc1626',GradientType=1 );

-->
</style>
<script language="javascript" type="text/javascript" src="uhr.js"></script>
  </head>
  <body style="background-color:#efefef;">
    <?php include 'header.inc.php'; ?>

      <!-- Seiteninhalt -->
      <center><p class="bg-primary">USB - das Urspringer Schwarze Brett</p></center>
<!-- <?php echo date("w"); //Ausgabe TAG in 0-7 ?> -->
<div class="container-fluid">
    <div class="row">
  <div class="col-md-7" >
    <p class="bg-success">
    <h2><i><p class="bg-primary">Vertretungen </i></h2>
    <h3>
       <?php  // Modul V-Plan
$vplan = file_get_contents('vplan.txt');
echo $vplan
    ?> </h3> </p> </p>
  </div>
<div class="col-md-5"><h2><i><p class="bg-warning">Heute in der Mensa...</p></i></h2>
  <h3> <?php  // Modul Mensa - Lecker lecker
  //$array = file("mensa.txt");
//  $test = count(file("mensa.txt")); //FIXME: Jede Woche aktuallisieren
//  echo $array[date("w")];
$t = date("H");
if ($t > "14") {
    echo "<i>Abendessen:</i><br>";
    $array = file("mensaa.txt");
    $test = count(file("mensaa.txt"));
    echo $array[date("w")];
} else {
    echo "Mittagessen!";
    $array = file("mensa.txt");
    $test = count(file("mensa.txt"));
    echo $array[date("w")];
}
  ?> </h3>
</div>
</div>
</div>
<div class="row">
  <div class="col-md-7"><p class="bg-warning">
  <h2><i><p class="bg-warning">Humorecke</i></h2>
  <h3> REVIEW: Da sollten Witze hin! </h3> <!-- FIXME: basteln in php -->
    </div>
  <div class="col-md-5"><p class="bg-success">
  <h2><i><p class="bg-success">Der Neuste Beitrag des Urspringblogs</p></i>
  <h3>

  <?php
  // Feed einlesen
  if( !$xml = simplexml_load_file('https://www.urspringblog.de/feed/') ) {
      die('Fehler beim Einlesen der XML Datei!');
  }

  // Ausgabe Array
  $out = array();

  // auszulesende Datensaetze
  $i = 2;

  // Items vorhanden?
  if( !isset($xml->channel[0]->item) ) {
      die('Keine Items vorhanden!');
  }

  // Items holen
  foreach($xml->channel[0]->item as $item) {
      if( $i-- == 0 ) {
          break;
      }

      $out[] = array(
          'title'        => (string) $item->title,
          'description'  => (string) $item->description,
          'link'         => (string) $item->guid,
          'date'         => date('d.m.Y H:i', strtotime((string) $item->pubDate))
      );
  }

  // Eintraege ausgeben
  foreach ($out as $value) {
      echo $value['title']."\r\n";
  }
  ?>

</h3>

    </div>
</div>
<p align="right"><img src="logow.png" alt="Logo der Urspringschule" class="pull-right"></p> <!-- Nettes Urspringlogo -->
<div style="display:block; text-align:center;"> <br>
<center><div id="ZeitBox01"><br>  <div id="ZeitAnzeige"></div></div>  <!-- Uhrzeit aus dem Header -->
</center>


</div>
       <!-- Seite fertig -->
      <?php include 'footer.inc.php'; ?>
  </body>
</html>
