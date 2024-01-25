<?php
include 'connection.php';

$id = $_GET['id'];

$delete = "DELETE FROM `login_data` WHERE id = '$id'";
$result = mysqli_query($conn,$delete);

if ($result) {
    echo "<script>alert('record delete successfully');</script>";

?>
<meta http-equiv="refresh" content="0; url = http://localhost/php_program/php_project/display.php" />
<?php
}else{
    echo "Failed connection!"; 
}
?>