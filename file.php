<?php
require 'connection.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" id=""><br><br>
        <input type="submit" value="file" name="submit" accept="image/">
    </form>
</body>
</html>
<?php

if (isset($_FILES["file"])) {
    $filename = $_FILES["file"]["name"];
    $filesize = $_FILES["file"]["size"];
    $tempname = $_FILES["file"]["tmp_name"];
    $filetype = $_FILES["file"]["type"];
    $folder = "images/" . $filename;

    // Move the uploaded file to the specified folder
    if (move_uploaded_file($tempname, $folder)) {
        echo "<img src = '$folder' height = '100px' width = '100px'>";
    } 
} else {
    echo "No file uploaded.";
}
?>