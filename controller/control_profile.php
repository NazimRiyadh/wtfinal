<?php
session_start();
include_once '../model/mydb.php';

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Fetch user info from database
$conn = getDB();
$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit;
}
?>