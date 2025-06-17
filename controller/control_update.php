<?php
session_start();
include_once '../model/mydb.php';

if (!isset($_SESSION['username'])) {
    header('Location: ../view/login.php');
    exit;
}

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $date_of_birth = $_POST['date_of_birth'] ?? '';
    $vehicle_bike = isset($_POST['vehicle_bike']) ? 1 : 0;
    $vehicle_car = isset($_POST['vehicle_car']) ? 1 : 0;
    $vehicle_boat = isset($_POST['vehicle_boat']) ? 1 : 0;

    $fav_language = $_POST['fav_language'] ?? '';

    $file_path = null;
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $filename = basename($_FILES['file']['name']);
        $target_file = $target_dir . $filename;
        move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
        $file_path = $target_file;
    }

    $userData = [
        'username' => $username,
        'email' => $email,
        'phone' => $phone,
        'date_of_birth' => $date_of_birth,
        'vehicle_bike' => $vehicle_bike,
        'vehicle_car' => $vehicle_car,
        'vehicle_boat' => $vehicle_boat,
        'fav_language' => $fav_language,
        'file_path' => $file_path
    ];

    updateUser($userData);

    header('Location: ../view/profile.php');
    exit;
} else {
    header('Location: ../view/update.php');
    exit;
}
