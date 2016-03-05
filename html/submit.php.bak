<!DOCTYPE html>
<html lang="de">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <title>DownloadPi</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


  </head>

  <body>
    </br>
    <?php include 'header.inc.php'; ?>

<br><br><br><br><br><br><br><br>
<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<span class="sr-only">Error:</span>
Die Daten wuden gespeichert!
</div>

        <?php
        $Antwort = $_POST['text'];     /* es wird der Text ausgegeben, den du im Formular eingegeben hast */
        $Speicher = nl2br($Antwort);
        //echo $Speicher;

        if (!file_exists('mensa.txt')) {
            exit('Datei konnte nicht gefunden werden!');
        }
        $text = 'Hallo';// Schreiben des neuen Wertes
        $fp = @fopen('mensa.txt', 'w');
        if (!$fp) {
            exit('Datei nicht zum Schreiben geöffnet');
        }
        fputs($fp, $Speicher);
        fclose($fp);
        echo 'geschrieben <br />';
        echo 'Aufruf script <br />';
        echo shell_exec('.&leer.sh');
        echo '<br />Script fertig  ';
        $homepage = file_get_contents('./mensa.txt');
        echo $homepage;
        $code1 = 'sed -i -e :a -e'; // sed -e :a -e 's/<[^>]*>//g;/</N;//ba' mensa.txt
        $code2 = '\'s/<[^>]*>/';
        $code3 = '/g;/</N;/';
        $code4 = '/ba\' mensa.txt';
        $output = shell_exec($code1.$code2.$code3.$code4);
        echo "<pre>$output</pre>";
        ?>

<br><br><br><br><br><br><br><br><br><br><br><br>

      <?php include 'footer.inc.php'; ?>
  </body>

</html>
