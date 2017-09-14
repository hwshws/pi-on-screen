<!DOCTYPE html>

<!--html manifest="this.appcache"-->
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
    <meta name="description" content="Das Urspringer Schwarze Brett - Backend">
    <meta name="author" content="HWS">
    <title>Frontend-USB-füttern</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <style>
        .aktuell {
            color: #ff0000;
            margin: 1em 0;
        }

        .view {
            display: none;
        }

        .active {
            display: block;
        }

    </style>
</head>
<body class="container">

<h2>Willkommen in der Konfiguration für das Urspringer Schwarze Brett. <i>(USB)</i><br>
    Die Nutzung sollte selbsterklärend sein.</h2>

<div class="alert alert-danger" role="alert"><b>Achtung!</b><br>Technisch bedingt, und auch der Internetbandbreite
    geschuldet, kann es bis zu 10 Minuten dauern, bis die Nachricht auf dem
    Fernseher erscheint. <br> Zwischen 18 Uhr und 7 Uhr findet ebenfalls keine Aktualisierung statt.
</div>
<div class="btn-group" role="group">
    <button type="button" class="btn btn-default view-btn" id="btn-info">Informationen</button>
    <button type="button" class="btn btn-default view-btn" id="btn-mensa">Speiseplan</button>
    <button type="button" class="btn btn-default view-btn" id="btn-geb">Geburtstage</button>
</div>
<div class="view active" id="info-view">
    <form class="form-horizontal" method="post" action="ausw.php">
        <fieldset>
            <!-- Form Name -->
            <legend>Urspringer Schwarzes Brett - Bekanntmachungen</legend>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Anzeige Schwarzes Brett</label>
                <div class="col-md-4">
                    <input id="textinput" name="info" placeholder="Füll mich!" class="form-control input-md"
                           required=""
                           type="text">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Autor</label>
                <div class="col-md-4">
                    <input id="name" name="name" placeholder="Autor eingeben" class="form-control input-md"
                           required=""
                           type="text">
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
    <h3 class="aktuell"><i>Aktuell zu sehen</i></h3>
    <?php
    $lines = file('hws.txt');
    $letzte_zeile = $lines[count($lines) - 1];

    /* rsort($lines);
    for($i = 0; $i < 20; $i++) {
    echo nl2br($lines[$i]);
    }*/

    //echo 'Aktuell zu sehen:<br />' ."\n";
    $message = file_get_contents('message.txt');
    echo nl2br($message);

    //echo 'Die letzten Einträge:<br />' ."\n";

    //echo date("d.m.Y-H:i:s ") . "\n";
    //include 'hws.txt';

    ?>
</div>
<div class="view" id="mensa-view">
    <form method="post" action="upload/upload.php?filename=speiseplan" enctype="multipart/form-data">
        <fieldset>
            <!-- Form Name -->
            <legend>USB Speiseplan</legend>
            <div class="form-group">
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <p class="small"><?php
                $target_dir = "/home/user/Projects/pi-on-screen/html/upload/";
                //$target_dir = "/home/heinz-wilhelm/pi-on-screen/html/upload/";
                $targetFile = "speiseplan.xls";
                if (file_exists($target_dir . "speiseplan.xls")) {
                    echo "Speiseplan wurde zuletzt modifiziert:: " . date("F d Y H:i:s.", filemtime($target_dir . "speiseplan.xls"));
                } elseif (file_exists($target_dir . "speiseplan.xlcx")) {
                    echo "Speiseplan wurde zuletzt modifiziert:: " . date("F d Y H:i:s.", filemtime($target_dir . "Speiseplan.xlcx"));
                }
                ?></p>
            <div class="form-group">
                <button id="send" name="send" class="btn btn-info">Hochladen</button>
            </div>
        </fieldset>
    </form>
</div>
<div class="view" id="geb-view">
    <form method="post" action="upload/upload.php?filename=geburtstage" enctype="multipart/form-data">
        <fieldset>
            <!-- Form Name -->
            <legend>UBS Speiseplan</legend>
            <div class="form-group">
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <p class="small"><?php
                $target_dir = "/home/heinz-wilhelm/pi-on-screen/html/upload/";
                $targetFile = "Speiseplan.xls";
                if (file_exists($target_dir . $targetFile)) {
                    echo "Speiseplan wurde zuletzt modifiziert:: " . date("F d Y H:i:s.", filemtime($target_dir . $targetFile));
                    $targetFile = "Speiseplan.xlcx";
                } elseif (file_exists($target_dir . "Speiseplan.xlsx")) {
                    echo "Speiseplan wurde zuletzt modifiziert:: " . date("F d Y H:i:s.", filemtime($target_dir . "Speiseplan.xlsx"));
                }
                ?></p>
            <div class="form-group">
                <button id="send" name="send" class="btn btn-info">Hochladen</button>
            </div>
        </fieldset>
    </form>
</div>
<div class="view" id="geb-view">
    <form method="post" action="upload/upload.php" enctype="multipart/form-data">
        <fieldset>
            <!-- Form Name -->
            <legend>USB Geburtstage</legend>
            <div class="form-group">
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="form-group">
                <button id="send" name="send" class="btn btn-info">Hochladen</button>
            </div>
            <p class="small"><?php
                $target_dir = "/home/heinz-wilhelm/pi-on-screen/html/upload/";
                $targetFile = "Speiseplan.xls";
                if (file_exists($target_dir . $targetFile)) {
                    echo "Gebutstagsliste wurde zuletzt modifiziert:: " . date("F d Y H:i:s.", filemtime($target_dir . $targetFile));
                    $targetFile = "Speiseplan.xlcx";
                } elseif (file_exists($target_dir . "Speiseplan.xlsx")) {
                    echo "Gebutstagsliste wurde zuletzt modifiziert:: " . date("F d Y H:i:s.", filemtime($target_dir . "Speiseplan.xlsx"));
                }
                ?></p>
        </fieldset>
    </form>
</div>


<!-- JavaScript goes last for the page to load faster -->
<script type="application/javascript" src="js/jquery.min.js"></script>
<script type="application/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.view-btn').click(function () {
            var viewName = this.id.replace('btn-', '');
            var view = $('#' + viewName + '-view');
            if (view.length > 0) {
                view = view[0];
                $('.view').removeClass('active');
                view.classList.add('active');
            }
        });
    });
</script>

</ <!-- TODO: Was ist das? -->

</html>
