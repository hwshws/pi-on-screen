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
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style type="text/css">
        html body {
            font-family: 'Roboto', sans-serif;
        }

        .inhalte {
            font-size: 1.5em;
            margin: 0px 0 -5px;
        }

        .panel-body {
            padding-top: !important;
            10px;
            padding-bottom: !important;
            10px;
        }

        .fahrplan > tr > td {
            padding-right: 15px;
        }

        #vplan {
            margin: 6px 0 2px;
        }

        .wetter-img {
            width: 175px;
            padding 0 5px;
            margin: 0 auto;
            float: left;
        }

        .wetter-text {
            /*font-family: Arial;*/
            text-align: center;
            border: solid 1px #000000;
            background: #DCEDE0;
            width: 155px;
            padding: 4px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        <!-- LINKE SPALTE -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

            <!-- VERTRETUNGSPLAN -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4><b> <!--     Vertretungsplan /--> Bekanntmachungen </b></h4>
                </div>
                <div class="panel-body">
                    <h3 id="vplan"></h3>
                </div>
            </div><!-- /VERTRETUNGSPLAN -->
            <!-- /VERTRETUNGSPLAN / Bekanntmachungen -->

            <!--Fahrplan -->

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4><b> Ihre nächsten Verbindungen </b></h4>
                </div>
                <div class="panel-body" id="fahrplan">
                    <h3>Der Fahrplan ist zur Zeit nicht verfügbar</h3>
                </div>
            </div> <!--Cronjob sollte laufen -->
            <!-- /Fahrplan -->

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4><b> Zitat des Tages </b></h4>
                </div>
                <div class="panel-body">
                    <h4 id="zitat"></h4>
                </div>
                <!--Cronjob sollte laufen -->
            </div>
            <!-- Geburtstage -->
            <div id="geb"></div>
            <!-- UHRZEIT -->
            <div class="panel panel-default">
                <div class="panel-body" id="uhrzeit">
                    <span style="font-size:2.0em;"><div id="ZeitBox01"><div id="ZeitAnzeige"></div></div></span>
                </div>
            </div><!-- /UHRZEIT -->
            <p align="right"><img src="logow.png" alt="Logo der Urspringschule" class="pull-right" width="70"
                                  height="53"></p> <!-- Nettes Urspringlogo -->
            <p>
                Version 1.7.1 vom 22.09.2019 <br> proudly presented by OJJGHSKPLHTK
            </p>
        </div><!-- /LINKE SPALTE -->


        <!-- RECHTE SPALTE -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

            <!-- SPEISEPLAN -->
            <div id="mensa"></div>
            <!-- /SPEISEPLAN -->
            <div id="dienst"></div>
            <!-- Wetter -->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4><b> Wetter </b></h4>
                </div>
                <div class="panel-body">


                    <div style="width: 800px;">

                        <div class="wetter-img">
                            <div class="wetter-text" id='tameteo'>
                                <b>Urspring</b><br/> <img
                                        src='http://www.mein-wetter.com/widget4/a9f47ef2e83b474d91fe89c8a6cb5491.png'
                                        id="wetteru" border='0'><br/></div>
                        </div>
                        <div class="wetter-img">
                            <div class="wetter-text" id='tameteo'>
                                <b>Ulm</b><br/><img
                                        src='http://www.mein-wetter.com/widget4/1e3523ed49934f8ba2800a5dc7946e8d.png'
                                        id="wetterulm" border='0'><br/></div>
                        </div>
                        <div class="wetter-img">
                            <div class="wetter-text" id='tameteo'>
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

        </div><!-- /RECHTE SPALTE -->

    </div><!-- /.row -->
</div>
<!-- /.container -->

<!-- JavaScript goes last for the page to load faster -->
<script type="application/javascript" src="js/jquery.min.js"></script>
<script type="application/javascript" src="js/bootstrap.min.js"></script>
<script type="application/javascript">
    /*setInterval(function () {
        document.getElementById("fahrplan").src = "https://vrrf.finalrewind.org/Schelklingen/Schelklingen.png?frontend=png&backend=efa.DING";

    }, 60 * 1000);*/
    $(document).ready(function () {
        setInterval(function () {
            document.getElementById("wetterulm").src = "http://www.mein-wetter.com/widget4/1e3523ed49934f8ba2800a5dc7946e8d.png";
            document.getElementById("wetteru").src = "http://www.mein-wetter.com/widget4/a9f47ef2e83b474d91fe89c8a6cb5491.png";
            document.getElementById("wetterstr").src = "http://www.mein-wetter.com/widget4/30119a98e2384faaaad7e88ee0bdb3b2.png";

        }, 15 * 60 * 1000);

        $("#news").load('news.php');
        setInterval(function () {
            $("#news").load('news.php');
        }, 5 * 60 * 1000);

        $("#mensa").load('mensa.php');
        setInterval(function () {
            $("#mensa").load('mensa.php');
        }, 30 * 60 * 1000);

        $("#vplan").load('vplan.php');
        setInterval(function () {
            $("#vplan").load('vplan.php');
        }, 10 * 60 * 1000);

        $("#geb").load('geb.php');
        setInterval(function () {
            $("#geb").load('geb.php');
        }, 2 * 60 * 60 * 1000);

        $("#dienst").load('dienst.php');
        setInterval(function () {
            $("#dienst").load('dienst.php');
        }, 2 * 60 * 60 * 1000);

        $("#zitat").load('zitat.php');
        setInterval(function () {
            $("#zitat").load('zitat.php');
        }, 2 * 60 * 60 * 1000);
    });

    //scrolly scrolly
    /*const body = document.body
        , html = document.documentElement;
    let height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight)
        , diff = height - window.innerHeight;
    if (diff > 0) {
        (function loop(i) {
            if (i > 0) {
                window.scrollBy(0, diff / 4);
                if (i < 4)
                    setTimeout(() => loop(i++), 250);
                else {
                    setTimeout(() => loop(-1), 5000);
                }
            } else {
                window.scrollBy(0, -(diff / 4));
                if (i > -4)
                    setTimeout(() => loop(i--), 250);
                else {
                    setTimeout(() => loop(1), 5000);
                }
            }
        })(1);
    }*/

    function refreshSchedule(id) {
        const url = 'https://vrrf.finalrewind.org/Schelklingen/Schelklingen.json?frontend=json&backend=efa.DING'
            , div = document.querySelector('#' + id);
        $.getJSON(url, data => {
            if (data.error !== null) {
                div.innerHTML = "<h3>Der Fahrplan ist zur Zeit nicht verfügbar</h3>";
            } else {
                try {
                    let table = document.createElement('table');
                    table.classList.add('fahrplan');
                    data.preformatted.forEach(zugData => {
                        let row = document.createElement('tr');
                        zugData.forEach(text => {
                            text = text.replace(' InterRegioExpress', '')
                                .replace(' Regional-Express', '')
                                .replace(' Hohenzollerische Landesbahn (SWEG)', '')
                                .replace(' Regionalbahn', '');
                            let entry = document.createElement('td');
                            entry.innerText = text;
                            row.appendChild(entry);
                        });
                        table.appendChild(row);
                    });
                    div.innerHTML = '';
                    div.appendChild(table);
                } catch (ex) {
                    div.innerHTML = "<h3>Der Fahrplan ist zur Zeit nicht verfügbar</h3>";
                    console.error(ex);
                }
            }
        });
    }

    refreshSchedule('fahrplan');
    setInterval(() => refreshSchedule('fahrplan'), 60 * 1000);
</script> <!-- http://snipplr.com/view.php?codeview&id=17272 -->
</body>
</html>
