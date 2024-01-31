
<?php include 'database.php';?>
<?php
 
session_start();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

        $client_id = $_POST['id'];
        $fname = $_POST['name'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $tdate = $_POST['tdate'];
        $tmode = $_POST['tmode'];
        $tid = $_POST['tid'];
        $bank = $_POST['bank'];
        $account = $_POST['account'];
        $ifsc = $_POST['ifsc'];
$file = $_FILES["file2"];
$fileError = $file["error"];

 
$sql = "UPDATE client SET name = '$fname', lname='$lname', email = '$email', phone = '$phone', tdate='$tdate', tmode='$tmode', tid='$tid', bankname = '$bank', account = '$account', ifsc = '$ifsc'";

if ($fileError === 0) {
    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileSize = $file["size"];

    // Define the upload directory
    $uploadDir = "uploads/";
    $filePath = $uploadDir . $fileName;

    // Move uploaded file to the server
    if (move_uploaded_file($fileTmpName, $filePath)) {
        $sql .= ", file2 = '$fileName', content2 = '$filePath'";
    } else {
        echo "Error moving uploaded file.";
    }
}

$sql .= " WHERE id = '$client_id'";

if ($conn->query($sql) === TRUE) {
    header("Location: tables.php");
    exit(); // Important to exit after redirection
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the connection
$conn->close();
?>
