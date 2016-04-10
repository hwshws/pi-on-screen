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
        <meta http-equiv="refresh" content="1800; URL=http://127.0.0.1/index.php" />
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
                  <!--  <h3>
                  //     <?php  // Modul V-Plan
              //  $vplan = file_get_contents('vplan.txt');
                //echo $vplan
                    ?> </h3> -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                      <h4><b>      Vertretungsplan / Bekanntmachungen </b></h4>
                        </div>
                        <div><h3>
                             <table class="table table-striped">
                                <tr>
                                    <td><b>Klasse</b></td>
                                    <td><b>Stunde</b></td>
                                    <td><b>&Auml;nderung</b></td>
                                </tr>
                                <tr class="success">
                                    <td>7</td>
                                    <td>2.</td>
                                    <td>Raum&auml;nderung: Musikraum</td>
                                <tr class="success">
                                        <td>7</td>
                                        <td>5.</td>
                                        <td>Vertretung: Stein - GTZ4</td>
                                </tr>
                                <tr class="success">
                                    <td>7 (Frz)</td>
                                    <td>5./7.</td>
                                    <td>Raum&auml;nderung: Franz.Raum</td>
                                  <tr class="success">
                                        <td>7</td>
                                        <td>5./7.</td>
                                        <td>Raum&auml;nderung: EK-Raum</td>
                                <tr class="success">
                                    <td>7</td>
                                    <td>7.</td>
                                    <td>Vertretung: A.Wetzler - GTZ4</td>
                                </tr>
                                </tr>
                                <tr class="warning">
                                    <td>9</td>
                                    <td>3. Std.</td>
                                    <td>Raum&auml;nderung: Bioraum</td>
                                </tr>
                                <tr class="danger">
                                    <td>10a</td>
                                    <td>1./2.</td>
                                    <td>entfällt</td>
                                </tr>
                                <tr class="warning">
                                    <td>9</td>
                                    <td>4./5.</td>
                                    <td>Raum&auml;nderung: Musikraum</td>
                                </tr>
                                <tr class="default">
                                    <td>11 Ma (Hh)</td>
                                    <td>1./2.</td>
                                    <td>Raum&auml;nderung: Englischraum</td>
                                </tr>
                                <tr class="default">
                                    <td>11 D (AWe)</td>
                                    <td>1./2.</td>
                                    <td>Raum&auml;nderung: PAV</td>
                                </tr>
                                <tr class="default">
                                    <td>11 Ma (Wa)</td>
                                    <td>3./4.</td>
                                    <td>Raum&auml;nderung: Chemieraum</td>
                                </tr>
                                <tr class="default">
                                    <td>11 LiT</td>
                                    <td>10./11.</td>
                                    <td>entfällt</td>
                                </tr>
                                <tr class="danger">
                                    <td>DaF</td>
                                    <td>8./9.</td>
                                    <td>Raum&auml;nderung: GTZ1</td>
                                </tr>


                            </table>

                          </h3>

                        </div>
                    </div><!-- /VERTRETUNGSPLAN -->

                    <!-- ZITAT -->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                         <h4><b>   Zitat des Tages  </b></h4>
                        </div>
                        <div class="panel-body" id="zitat">
                     <h4><b><?php $zitat = file_get_contents('zitatdestages.txt'); echo $zitat;?></div>
                        <div class="panel-footer">
                            <i>&#126; <?php $autor = file_get_contents('autordestages.txt'); echo "$autor";?></i> </b><h4>
                        </div>
                    </div><!-- /ZITAT -->
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

                          <h3> <?php  // Modul Mensa - Lecker lecker
                          $array = file("mensa.txt");
                          $test = count(file("mensa.txt")); //FIXME: Jede Woche aktuallisieren
                          echo $array[date("w")];
                          ?> </h3>

                        </div>
                    </div><!-- /SPEISEPLAN -->
		                  <!-- NEWSTICKER -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                    <h4><b> Newsticker - <i>Urspringblog</i> & Tagesschau </b></h4>
                        </div>
                        <div class="panel-body" id="newsticker">
                          <span style="font-size:1.03em;"><h3><i>

                              <?php
                              // Feed einlesen - Urspringblog
                              if( !$xml = simplexml_load_file('https://www.urspringblog.de/feed/') ) {
                                  die('Es passierte ein Fehler! Das tut uns leid.');
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
                                  die('Es passierte ein Fehler! Das tut uns leid.');
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
                  Version 1.1.1 vom 09.04.16 <br> proudly presented by OJJGHSLH
                </p>
                </div><!-- /RECHTE SPALTE -->

            </div><!-- /.row -->


        </div><!-- /.container -->

        <!-- JavaScript goes last for the page to load faster -->
        <script type="application/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="application/javascript" src="js/bootstrap.min.js"></script>
        <script type="application/javascript" src="js/holder.js"></script>
        <script type="application/javascript" src="js/logic.js"></script>
    </body>
</html>
