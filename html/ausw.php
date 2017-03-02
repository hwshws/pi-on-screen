<?php
//{
    // und nun die Daten in eine Datei schreiben
    // Datei wird zum Schreiben geöffnet

    $t = date("d.m.Y-H:i:s ");

    $handle = fopen ( "hws.txt", "a" );

    // schreiben des Inhaltes von $t
    fwrite ( $handle, $t."\n" );
    // schreiben des Inhaltes von email
    fwrite ( $handle, $_POST['info']."\n" );

    // Trennzeichen einfügen, damit Auswertung möglich wird
    //  fwrite ( $handle, "\n" );
    // schreiben des Inhalts von name
    fwrite ( $handle, $_POST['name']."\n" );
    // schreiben des Trennzeichen
    fwrite ( $handle, "----"."\n" );

    // Datei schließen
    fclose ( $handle );

    echo "Danke - Ihre Daten wurden gespeichert";
    // ------------------------------------------------------
    $handle2 = fopen ( "message.txt", "w+" );
    // schreiben des Inhaltes von info
    fwrite ( $handle2, $_POST['info']."\n" );


    // Datei schließen
    fclose ( $handle2 );

    echo "Danke - Ihre Daten wurden wieder gespeichert";

    // Datei wird nicht weiter ausgeführt
    exit;
//}
?>
