<?php
function isLoggedin() {
    return isset($_SESSION["email"]);
}

function isAdmin() {
    return (isset($_SESSION["role"]) && $_SESSION["role"] === "admin");
}

function isClient() {
    return (isset($_SESSION["role"]) && $_SESSION["role"] === "client");
}

function requireLogin() {
    if (!isLoggedin()) {
        header("Location: index.php");
        exit;
    }
}
?>
