<!DOCTYPE html>
<html lang="de">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title>USB - Urspringer Schwarzes Brett</title>

    <!-- Bootstrap-CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Besondere Stile für diese Vorlage -->
    <link href="css/sticky-footer.css" rel="stylesheet">


  </head>

  <body>
    <?php include 'header.inc.php'; ?> <br><br><br>

      <!-- Seiteninhalt -->
 <?php echo date("w"); //"<br />" //Ausgabe TAG in 0-7  


$pdo = new PDO('mysql:host=localhost;dbname=usb', 'root', 'rico');

$sql = "SELECT * FROM mensa";
foreach ($pdo->query($sql) as $row) {
   echo $row['M1']."  ".$row['M2']."<br />";
   echo $row['NT']."<br /><br />";
}


$array = file("mensa.txt");
$test = count(file("mensa.txt"));
echo $array[date("w")];


?>
       <!-- Seite fertig -->   
      <?php include 'footer.inc.php'; ?>
  </body>

</html>
