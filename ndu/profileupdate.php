<?php
include 'database.php';

session_start();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION["email"];

$file = $_FILES["profile"];
$fileError = $file["error"];

$sql = "UPDATE client SET";

if ($fileError === 0) {
    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileSize = $file["size"];

    $uploadDir = "uploads/";
    $filePath = $uploadDir . $fileName;

    if (move_uploaded_file($fileTmpName, $filePath)) {
        $sql .= " file1 = ?, content1 = ?,";
    } else {
        echo "Error moving uploaded file.";
    }
}

$sql = rtrim($sql, ",");
$sql .= " WHERE email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $fileName, $filePath, $email);

if ($stmt->execute()) {
    // Success message
    $_SESSION["update_success"] = true;
    header("Location: profile.php");
    exit();
} else {
    echo "Error updating record: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
