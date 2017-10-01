<html>
<header>
    <script type="text/javascript">
        setTimeout(() => window.history.back(), 5000);
    </script>
</header>
<body>
<?php
if ($_POST['password'] == 'Achtopf') {
    $filename = $_GET['filename'];
    $target_dir = "/opt/usb/"; // TEST
//$target_dir = "/homepages/38/d139650057/htdocs/";  //on Server
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $target_name = $target_dir . $filename . "." . $fileType;
    if ($filename === null) {
        $uploadOk = 0;
    }
    if ($filename != "Geburtstage" && $filename != "Speiseplan") {
        $uploadOk = 0;
    }
// Check if file already exists
    if (file_exists($target_file)) {
        //echo "Sorry, file already exists.";
        unlink($target_name);
        //$uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        //echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($fileType != "xls" && $fileType != "xlsx") {
        //echo "FALSCH!";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, da ging was schief!";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_name)) {
            echo "Die Datei " . basename($_FILES["fileToUpload"]["name"]) . " wurde erfolgreich hochgeladen.";
        } else {
            echo "Sorry, da ging was schief!";
        }
    }
} else {
    echo "<h3 style='color: red'>Falsches Passwort</h3>";
}

?> <br><br>
<button onclick="window.history.back()">Zurück!</button>
