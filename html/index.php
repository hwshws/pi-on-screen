<!DOCTYPE html>

<!--html manifest="this.appcache"-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
        <meta name="description" content="Das Urspringer Schwarze Brett - nur zum internen Gebrauch">
        <meta name="author" content="HWS">
        <meta http-equiv="refresh" content="60; URL=http://127.0.0.1/index.php" />
        <title>USB - Urspringer Schwarzes Brett</title>
        <link rel="stylesheet" href="css/style.css">
        <script language="javascript" type="text/javascript" src="uhr.js"></script>
    </head>
    <body>

        <div class="container-fluid" id="content">
<br>

            <div class="row">

                <!-- LINKE SPALTE -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                    <!-- VERTRETUNGSPLAN -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                      <h4><b>      Vertretungsplan / Bekanntmachungen </b></h4>
                        </div>
                        <div><h3>
                        <!--  <?php include 'vplan.php'; ?>   -->
                    Leider gelingt es dem Verantwortlichen nicht, den Vertretungsplan zur Verfügung zu stellen. <br><br> Das tut uns leid.
                          </h3>

                        </div>
                    </div><!-- /VERTRETUNGSPLAN -->

                    <!--Fahrplan -->
                    <?php
                   $t = date("H");
                    if ($t <= "15") : ?>
                      <div class="panel panel-success">
                          <div class="panel-heading">
                           <h4><b>   Ihre nächsten Verbindungen </b></h4>
                          </div>
                          <div class="panel-body" id="zitat">
                       <h4><b><img src="https://vrrf.finalrewind.org/Schelklingen/Schelklingen.png?frontend=png&backend=efa.DING" alt="Abfahrtstafel"  width="470" height="125"  ></b></div> <!--Chronjob sollte laufen -->
                      </div>

                    <?php else : ?>
                    <?php endif; ?>
                   <!-- /Fahrplan -->

                   <div class="panel panel-success">
                          <div class="panel-heading">
                           <h4><b>   Zitat des Tages  </b></h4>
                          </div>
                          <div class="panel-body" id="zitat">
                       <h4><b><?php $zitat = file_get_contents('zitatdestages.txt'); echo $zitat;?></b></h4></div> <!--Chronjob sollte laufen -->
                          
                      </div>
			<!-- UHRZEIT -->
                    <div class="panel panel-default">
                        <div class="panel-body" id="uhrzeit" style="text-align:right;">
                            <span style="font-size:2.0em;"><div id="ZeitBox01"><div id="ZeitAnzeige"></div></div></span>
                        </div>
                    </div><!-- /UHRZEIT -->

                </div><!-- /LINKE SPALTE -->



                <!-- RECHTE SPALTE -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                    <!-- SPEISEPLAN -->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                         <h4><b>   Speiseplan </b></h4>
                        </div>
                        <div class="panel-body">

                          <h3>Leider gelingt es den Verantwortlichen nicht, den Speiseplan zur Verfügung zu stellen. <br>
                            Bitte Aushang beachten.</h3>


                        </div>
                    </div><!-- /SPEISEPLAN -->
                    <!-- Wetter -->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                         <h4><b>   Wetter </b></h4>
                        </div>
                        <div class="panel-body">

                          <div id='tameteo' style='font-family:Arial;text-align:center;border:solid 1px #000000; background:#DCEDE0; width:155px; padding:4px'><a href='http://www.mein-wetter.com/schelklingen.htm' target='_blank' title='Wetter Blaubeuren' style='font-weight: bold;font-size:14px;text-decoration:none;color:#000000;line-height:12px;'>Urspring</a><br/><a href='http://www.mein-wetter.com' target='_blank' title='mein-wetter.com'><img src='http://www.mein-wetter.com/widget4/a9f47ef2e83b474d91fe89c8a6cb5491.png' border='0'></a><br/><a href='http://www.mein-wetter.com' style='font-size:10px;text-decoration:none;color:#000000;line-height:10px;' target='_blank' >&copy; mein-wetter.com</a></div>


                        </div>
                    </div><!-- /Wertter -->
		                  <!-- NEWSTICKER -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                    <h4><b> Newsticker - <i>Urspringblog</i> &amp; Tagesschau </b></h4>
                        </div>
                        <div class="panel-body" id="newsticker">
                          <span style="font-size:1.03em;"><h3><i>

                              <?php
                              // Feed einlesen - Urspringblog
                              if( !$xml = simplexml_load_file('https://www.urspringblog.de/feed/') ) {
                                  die('Es passierte ein Fehler! Das tut uns leid');
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
                                  echo $value['title']."<br>";
                              } ?>
				                    </i>
				                    <?php

                              // TAGESSCHAU -Feed einlesen
                              if( !$xml = simplexml_load_file('http://www.tagesschau.de/xml/rss2') ) {
                                  die('Fehler beim Einlesen der XML Datei!');
                              }

                              // Ausgabe Array
                              $out = array();

                              // auszulesende Datensaetze
                              $i = 3;

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
                                  echo $value['title']."<br>";
                              }

                              ?> </span></h3>
                        </div>
                    </div><!-- /NEWSTICKER -->

                    <p align="right"><img src="logow.png" alt="Logo der Urspringschule" class="pull-right" width="68" height="51"></p> <!-- Nettes Urspringlogo -->
                <p>
                  Version 1.4.2-sv vom 05.02.17 <br> proudly presented by OJJGHSLH
                </p>
                </div><!-- /RECHTE SPALTE -->

            </div><!-- /.row -->


        </div><!-- /.container -->

        <!-- JavaScript goes last for the page to load faster -->
        <script type="application/javascript" src="js/jquery.min.js"></script>
        <script type="application/javascript" src="js/bootstrap.min.js"></script>
        <script type="application/javascript" src="js/holder.js"></script>
        <script type="application/javascript" src="js/logic.js"></script>
    </body>
</html>
