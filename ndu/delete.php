<?php
include ('database.php');
$id = $_GET['id'];
$sql = "DELETE from client WHERE  id = '$id'"; 
mysqli_query($conn, $sql);
header("Location: tables.php");
?>