<?php
include ('database.php');
 extract($_POST);
$sql = "DELETE from client WHERE  id = '$id'"; 
mysqli_query($conn, $sql);
 
?>