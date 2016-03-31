<!DOCTYPE html>

<!--html manifest="this.appcache"-->
<html>
    <head>
        <title>U-Bildschirm Layout Entwurf</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <div class="container" id="content" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);">


            <div class="row">

                <!-- LINKE SPALTE -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                    <!-- VERTRETUNGSPLAN -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Vertretungsplan 05.03.2015
                        </div>
                        <div class="panel-body">

                          <h3>
                             <?php  // Modul V-Plan
                      $vplan = file_get_contents('vplan.txt');
                      echo $vplan
                          ?> </h3>

                        </div>
                    </div><!-- /VERTRETUNGSPLAN -->

                    <!-- NEWSTICKER -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Newsticker
                        </div>
                        <div class="panel-body" id="newsticker">
                            <span class="label label-warning">TODO</span>
                            HWS macht das
                        </div>
                    </div><!-- /NEWSTICKER -->

                    <!-- ZITAT -->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Zitat des Tages
                        </div>
                        <div class="panel-body" id="zitat">
                            Hund und Sau!
                        </div>
                        <div class="panel-footer">
                            <i>&#126; Bernhard H&uuml;ttenrauch</i>
                        </div>
                    </div><!-- /ZITAT -->

                    <!-- UHRZEIT -->
                    <div class="panel panel-default">
                        <div class="panel-body" id="uhrzeit" style="text-align:right;">
                            <span style="font-size:1.5em;">05.03.2015 12:32:55</span>
                        </div>
                    </div><!-- /UHRZEIT -->

                </div><!-- /LINKE SPALTE -->



                <!-- RECHTE SPALTE -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                    <!-- SPEISEPLAN -->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Speiseplan vom 02. - 06.03.2015
                        </div>
                        <div class="panel-body">

                          <h3> <?php  // Modul Mensa - Lecker lecker
                          $array = file("mensa.txt");
                          $test = count(file("mensa.txt")); //FIXME: Jede Woche aktuallisieren
                          echo $array[date("w")];
                          ?> </h3>

                        </div>
                    </div><!-- /SPEISEPLAN -->

                    <!-- TAGESLOSUNG -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Tageslosung
                        </div>
                        <div class="panel-body" id="losung">
                            <h3><p>HERR, lass mir deine Barmherzigkeit widerfahren, dass ich lebe.<br>
                            Psalm 119,77</p>


                            <p>Der König sprach zu seinen Knechten: Geht hinaus auf die Straßen und ladet zur Hochzeit ein, wen ihr findet. Und die Knechte gingen auf die Straßen hinaus und brachten zusammen, wen sie fanden, Böse und Gute; und die Tische wurden alle voll.<br>
                            Matthäus 22,9-10</p></h3>
                        </div>
                    </div><!-- /TAGESLOSUNG -->

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
