<?php
session_start();
$target_dir = "images\\";
$target_file = $_SERVER['DOCUMENT_ROOT']. '/whats-next/' .$target_dir . basename($_FILES["fileToUpload"]["name"]);

$target_file = str_replace('\\', '/', $target_file);
echo($target_file);

echo PHP_EOL;

//echo $target_file;
$return_message = array();

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // array_push($return_message, "File is an image - " . $check["mime"] . ".");
        $uploadOk = 1;
    } else {
       array_push($return_message, "Sorry, file is not an image.");
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    array_push($return_message, "Sorry, file name already exists.");
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    array_push($return_message, "Sorry, your file is too large.");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    array_push($return_message, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  array_push($return_message, "Sorry, your file was not uploaded.");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       array_push($return_message, "The file \"". basename( $_FILES["fileToUpload"]["name"]). "\" has been uploaded.");
    } else {
       array_push($return_message, "Sorry, there was an error uploading your file.");
    }
}


$_SESSION['upload_message'] = $return_message;
echo($return_message);

//header("Refresh: 1; ./index.php"); /* Redirect browser */
header("Location: ../../index.php"); /* Redirect browser */

exit();
?>