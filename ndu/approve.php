 <?php
 include 'database.php';
 extract($_POST);
 $approve = 1;
 $sql="UPDATE client set aproved='$approve' where id = $id" ;
 mysqli_query($conn, $sql);
 ?>