<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <title>Was</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->

  </head>
  <body>
  </br>
  <?php include 'header.inc.php'; ?>

    <div class="col-md-6">
    <div class="page-header">
  <h1>Moinsn <small>auf dem Arbeitsknecht von  UgoesSky V2 "Poseidon"</small></h1>
</div>
  <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Dies ist derzeit ein Prototyp ohne Funktion. Die kommt noch!
</div>


<?php
function todo()
{
    $userdatei = fopen('./vplan.txt', 'r');
    while (!feof($userdatei)) {
        $zeile = fgets($userdatei, 1024);
   //echo $zeile;
   echo  nl2br($zeile);
   //echo nl2br($_POST['textarea']);
    }
    fclose($userdatei);
}
  ?></br>
<h1><small>Inhalt von vplan.txt</small></h1>

<?php
$homepage = file_get_contents('./vplan.txt');
?>

     <form method="post" action="submit.php">
         <textarea id="text" name="text" cols="70" rows="20"><?php echo $homepage; ?></textarea>
      <!-- <input type="submit" value="Senden" /> -->
      <input type="submit" class="btn btn-default" >
    </form>
<!-- <textarea name="Bemerkungen" rows="20" cols="70"><?php echo $homepage; ?></textarea> -->

<?php

exec('./todo.sh');
?>

    </div>
  </body>
</html>
