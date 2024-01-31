<?php include 'database.php';?>
<?php
 
session_start();

// Unset a specific session variable
unset($_SESSION['email']);

// Destroy the session
session_destroy();

// Redirect to login page or another appropriate page
header("Location: index.php");
exit;
?>