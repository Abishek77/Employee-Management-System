<?php
include 'database.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$encode = md5($password);
$phone = $_POST["phone"];
$ifsc = $_POST["ifsc"];
$account = $_POST["account"];
$bank = $_POST["bankname"];
$tdate = $_POST["tdate"];
$tmode = $_POST["tmode"];
$tid = $_POST["tid"];
$userstatus = 0;
$role = "client";
$file = $_FILES["file1"];

$fileName = $file["name"];
$fileTmpName = $file["tmp_name"];
$fileSize = $file["size"];
$fileError = $file["error"];

// Define the upload directory
$uploadDir = "uploads/";
$filePath = null; // Initialize filePath to NULL

if ($fileError === 0) {
    if (move_uploaded_file($fileTmpName, $uploadDir . $fileName)) {
        $filePath = $uploadDir . $fileName; // Set filePath when file is uploaded
    } else {
        echo "Error uploading file.";
    }
}

// Use NULL if filePath is still NULL, otherwise, use the actual filePath
$filePath = $filePath ? "'$filePath'" : "NULL";

// Insert file reference into database
$sql = "INSERT INTO client (name, lname, email, password, phone, tdate, tmode, tid, role, userstatus, bankname, account, ifsc, file1, content1) 
        VALUES ('$fname', '$lname', '$email', '$encode', '$phone', '$tdate', '$tmode', '$tid', '$role', '$userstatus', '$bank', '$account', '$ifsc', '$fileName', $filePath)";

if ($conn->query($sql) === TRUE) {
    header("Location: tables.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
