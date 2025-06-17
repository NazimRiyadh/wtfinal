<?php
include_once '../model/mydb.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = "Please enter both username and password.";
        include '../view/login.php';
        exit;
    }
    $result = checkLogin($username, $password);
    if ($result) {
        $_SESSION['username'] = $username;
        header("Location: ../view/profile.php");
        exit;
    } else {
        $error = "Invalid username or password.";
        include '../view/login.php';
        exit;
    }
   
} else {
    include '../view/login.php';
    exit;
}
