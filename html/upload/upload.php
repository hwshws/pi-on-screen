
<?php
$filename = $_GET['filename'];
//$target_dir = "/home/heinz-wilhelm/pi-on-screen/html/upload/";
$target_dir = "/home/user/Projects/pi-on-screen/html/upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_name = $target_dir . $filename . "." . $fileType;
if($filename === null) {
    $uploadOk = 0;
}
if($filename != "Geburtstage" && $filename != "Speiseplan") {
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
if($fileType != "xls" && $fileType != "xlsx") {
    //echo "FALSCH!";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_name)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
