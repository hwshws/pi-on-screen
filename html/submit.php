<html>

	<head>
	<title>In eine Text-Datei schreiben</title>
	</head>
	<body>

	<?php

	// Öffnet die Textdatei
	$f = fopen("vplan.txt", "w");

	// Schreibt in die Textdatei
	fwrite($f, "PHP macht Spaß!");

	// Schließt die Textdatei
	fclose($f);

	// Öffnet die Textdatei zum Lesen und liest den Inhalt aus
	$f = fopen("textfile.txt", "r");
	echo fgets($f);

	fclose($f);

	?>

	</body>
	</html>
