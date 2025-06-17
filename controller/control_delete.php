<?php
include_once '../model/mydb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    
    if (deleteUser($id)) {
        header("Location: ../view/login.php");
        exit;
    } else {
        echo "Failed to delete user.";
    }
} else {
    header("Location: ../view/login.php");
    exit;
}
