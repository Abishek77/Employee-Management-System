<?php
$server = "localhost";
if(isset($server) && $server == "localhost:3306") {
    $conn = mysqli_connect("localhost:3306", "nducapital", "ndu@123", "ndu") or die("Connection lost");
} else {
    $conn = mysqli_connect("localhost", "root", "", "ndu") or die("Connection lost");
}
?>
