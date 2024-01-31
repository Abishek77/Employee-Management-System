<?php
include ('database.php');

if(
    isset($_GET['id']) &&
    isset($_GET['email'])  
     
) {
    $aproved = 1;
    $client_id = $_GET['id'];
    $cemail = $_GET['email'];
   echo $client_id, $cemail;
   $sql = "UPDATE client SET aproved = '$aproved' WHERE  id= '$client_id' AND email='$cemail'";
  mysqli_query($conn,  $sql);
    header("Location: tables.php");
   

} else {
    echo "Required parameters not found in the URL.";
}
?>
?>