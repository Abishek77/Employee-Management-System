
<?php include 'database.php';?>
<?php

 extract($_POST);

$sql = "UPDATE client SET name = '$name', lname='$lname', email = '$email', phone = '$phone', tdate='$tdate', tmode='$tmode', tid='$tid', bankname = '$bank', account = '$account', ifsc = '$ifsc' where id = '$id'";

 mysqli_query($conn, $sql);
?>
