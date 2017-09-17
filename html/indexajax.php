<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta name="description" content="Das Urspringer Schwarze Brett - nur zum internen Gebrauch">
    <meta name="author" content="HWS">
    <title>USB - Urspringer Schwarzes Brett</title>
    <!--<link rel="stylesheet" href="css/style.css"> -->
    <script language="javascript" type="text/javascript" src="uhr.js"></script>
    <!-- <script type="application/javascript" src="js/jquery.min.js"></script> -->
    <style type="text/css">
        .inhalte {
            /* color: #000000;
             background-color: #FFFFFF; */
            font-size: 1.5em;
            margin: 20px 0 10px;
        }

        .panel-body {
            padding-top: !important;10px;
            padding-bottom: !important;10px;
        }
    </style>

</head>


<body>

<div class="container-fluid" id="INHALT">
<div class="container-fluid">
    <br>

    <div class="row">

        <!-- LINKE SPALTE -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

            <!-- VERTRETUNGSPLAN -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4><b> <!--     Vertretungsplan /--> Bekanntmachungen </b></h4>
                </div>
                <div>
                    <h3>
                        <div id="vplan"></div>
                    </h3>
                    <h3 id="vplan"></h3>
                </div>
            </div><!-- /VERTRETUNGSPLAN -->
            </div><!-- /VERTRETUNGSPLAN / Bekanntmachungen -->

            <!--Fahrplan -->

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4><b> Ihre nächsten Verbindungen </b></h4>
                    <h4><b> Ihre nächsten Verbindungen </b></h4> <!-- TODO: JSON -->
                </div>
                <div class="panel-body inhalte" id="fahrplan">
                    <div id="content"><img
                                src="https://vrrf.finalrewind.org/Schelklingen/Schelklingen.png?frontend=png&backend=efa.DING"
                                id="fahrplan" alt="Abfahrtstafel" width="470" height="125"/></div>
                </div> <!--Cronjob sollte laufen --></div>
            <!-- /Fahrplan -->

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4><b> Zitat des Tages </b></h4>
                </div>
                <div class="panel-body" id="zitat">
                    <h4><b><?php $zitat = file_get_contents('zitatdestages.txt');
                            echo $zitat; ?></b></h4></div> <!--Cronjob sollte laufen -->
                    <h4><?php $zitat = file_get_contents('zitatdestages.txt');
                            echo $zitat; ?></h4></div> <!--Cronjob sollte laufen -->

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
                    <h4><b> Speiseplan - Testphase </b></h4>
                </div>
                <div class="panel-body">
                <div class="panel-body" style=" padding: !important;0px;">

                    <h3 id="mensa"></h3>

                    <h3 id="mensa" style="margin-top: 6px; margin-bottom: 2px;"></h3>

                </div>
            </div><!-- /SPEISEPLAN -->
            <!-- Wetter -->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4><b> Wetter </b></h4>
                </div>
                <div class="panel-body">


                    <div style="width: 800px;">

                        <div style="width: 175px; padding-top: 0px; padding-bottom: 0px; padding-left: 5px; padding-right: 5px; float: left;">
                            <div id='tameteo'
                                 style='font-family:Arial;text-align:center;border:solid 1px #000000; background:#DCEDE0; width:155px; padding:4px'>
                                <b>Urspring</b><br/> <img
                                        src='http://www.mein-wetter.com/widget4/a9f47ef2e83b474d91fe89c8a6cb5491.png'
                                        id="wetteru" border='0'><br/></div>
                        </div>
                        <div style="width: 175px; padding-top: 0px; padding-bottom: 0px; padding-left: 5px; padding-right: 5px; float: left;">
                            <div id='tameteo'
                                 style='font-family:Arial;text-align:center;border:solid 1px #000000; background:#DCEDE0; width:155px; padding:4px'>
                                <b>Ulm</b><br/><img
                                        src='http://www.mein-wetter.com/widget4/1e3523ed49934f8ba2800a5dc7946e8d.png'
                                        id="wetterulm" border='0'><br/></div>
                        </div>
                        <div style="width: 175px; padding-top: 0px; padding-bottom: 0px; padding-left: 5px; padding-right: 5px; float: left;">
                            <div id='tameteo'
                                 style='font-family:Arial;text-align:center;border:solid 1px #000000; background:#DCEDE0; width:155px; padding:4px'>
                                <b>Stuttgart</b><br/><img
                                        src='http://www.mein-wetter.com/widget4/30119a98e2384faaaad7e88ee0bdb3b2.png'
                                        id="wetterstr" border='0'><br/></div>
                        </div>
                        <div style="clear: left;"></div>
                    </div>
                </div>
            </div>
            <!-- /Wetter -->

            <!-- NEWSTICKER -->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4><b> Newsticker - <i>Urspringblog</i> &amp; Tagesschau </b></h4>
                </div>
                <div class="panel-body" id="newsticker">
                    <div id="news" class="inhalte"></div>
                </div>
            </div><!-- /NEWSTICKER -->

            <p align="right"><img src="logo.svg" alt="Logo der Urspringschule" class="pull-right" width="68"
                                  height="51"></p> <!-- Nettes Urspringlogo -->
            <p>
                Version 1.5.1-ay vom 13.09.17 <br> proudly presented by OJJGHSKPLH
                Version 1.5.2-ay vom 16.09.17 <br> proudly presented by OJJGHSKPLH
            </p>
        </div><!-- /RECHTE SPALTE -->

    </div><!-- /.row -->


</div><!-- /.container -->

<!-- JavaScript goes last for the page to load faster -->
<script type="application/javascript" src="js/jquery.min.js"></script>
<script type="application/javascript" src="js/bootstrap.min.js"></script>
<script type="application/javascript">
    setInterval(function () {
        document.getElementById("fahrplan").src = "https://vrrf.finalrewind.org/Schelklingen/Schelklingen.png?frontend=png&backend=efa.DING";

    }, 60 * 1000);

    setInterval(function () {
        document.getElementById("wetterulm").src = "http://www.mein-wetter.com/widget4/1e3523ed49934f8ba2800a5dc7946e8d.png";
        document.getElementById("wetteru").src = "http://www.mein-wetter.com/widget4/a9f47ef2e83b474d91fe89c8a6cb5491.png";
        document.getElementById("wetterstr").src = "http://www.mein-wetter.com/widget4/30119a98e2384faaaad7e88ee0bdb3b2.png";

    }, 900000);
    setInterval(function () {
    }, 15 * 60 * 1000);
    //setInterval(function () { FIXME: Braucht man das noch?

    }, 60 * 1000);
//    }, 60 * 1000);

    $(document).ready(function () {
        $("#news").load('news.php')
        setInterval(function () {
            $("#news").load('news.php')
        }, 5 * 60 * 1000);
    });

    $(document).ready(function () {
        $("#vplan").load('vplan.php')
        setInterval(function () {
            $("#vplan").load('vplan.php')
        }, 10 * 60 * 1000);
    });

    $(document).ready(function () {
        $("#mensa").load('mensa.php')
        setInterval(function () {
            $("#mensa").load('mensa.php')
        }, 30 * 60 * 1000);
    });
</script> <!-- http://snipplr.com/view.php?codeview&id=17272 -->
</body>
</html>

