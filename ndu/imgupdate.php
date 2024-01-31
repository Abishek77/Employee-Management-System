<?php include 'database.php';?>
<?php
 
// Create connection
 

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$file = $_FILES["profile"];

$fileName = $file["name"];
$fileTmpName = $file["tmp_name"];
$fileSize = $file["size"];
$fileError = $file["error"];

// Define the upload directory
$uploadDir = "uploads/";
$filePath = $uploadDir . $fileName;

if ($fileError === 0) {
    // Move uploaded file to the server
    if (move_uploaded_file($fileTmpName, $filePath)) {
        // Insert file reference into database
       
  
$sql = "INSERT INTO client (name, lname, email, password, phone, tdate, tmode, tid, role, userstatus, file1, content1) VALUES ('$fname', '$lname', '$email', '$password', '$phone', '$tdate', '$tmode', '$tid', '$role', '$userstatus', '$fileName', '$filePath')";

if ($conn->query($sql) === TRUE) {
    header("Location: admin.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    }
}

// Check for errors

$conn->close();
?>
 
