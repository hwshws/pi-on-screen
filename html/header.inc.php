  <style type="text/css"> <!-- CSS Quark -->
          .linksbuendig {text-align: left;}
          .rechtsbuendig {text-align: right;}
          .zentriert {text-align: center;}
          .blocksatz {text-align: justify;}
          td {text-align: ","}
  </style> 
  <!-- TODO: MySQL Server Verbindung -->
  <?php
$db = mysqli_connect("localhost", "root", "rico", "usb");
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}
?>
<!-- Fixierte Navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Navigation ein-/ausblenden</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button></p>
      <a class="navbar-brand" href="./index.php"><div style="display:block; text-align:left;">USB - Das Urspringer Schwarze Brett </div> <!-- <div style="display:block; text-align:right;">TODO: Uhrzeit </div> -->
 
</a>
    </div>
    <!-- <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="./index.php">Home   <span class="glyphicon glyphicon-home"></span> </a></li>
        <li class="disabled"><a href="#">pyload</a></li>
        <li class="disabled">
          <a href="./anmeldung.php">
            <span class="glyphicon glyphicon-user"></span> Anmeldung</a>
        </li>
      </ul>
    </div> -->
    <!--/.nav-collapse -->
  </div>
</nav>
