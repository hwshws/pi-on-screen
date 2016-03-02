  <style type="text/css"> <!-- CSS Quark -->
          .linksbuendig {text-align: left;}
          .rechtsbuendig {text-align: right;}
          .zentriert {text-align: center;}
          .blocksatz {text-align: justify;}
          td {text-align: ","}
          h2 { font-size: 43px; }
		  p  { font-size: 1.2em; }
          a  { font-size: 0.7cm; }
          p  { background-image: url(logo.jpg); } <!-- Hintergrund V1 -->	
  </style> 
  <?php
mysql_connect("localhost", "root", "rico") or die(mysql_error()); // Bei Bedarf ändern
mysql_select_db(usb);

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
      <a class="navbar-brand" href="./index.php"><div style="display:block; text-align:left;">USB - Das Urspringer Schwarze Brett  </div> <!-- <div style="display:block; text-align:right;">TODO: Uhrzeit </div> -->
 
</a>
    </div>
    <!--/.nav-collapse -->
  </div>
</nav>
