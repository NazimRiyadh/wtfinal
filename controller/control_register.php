<?php
include_once '../model/mydb.php';

$errors = [];
$old = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old['username'] = $username = $_POST['username'] ?? '';
    $old['password'] = $password = $_POST['password'] ?? '';
    $old['confirm_password'] = $confirm_password = $_POST['confirm_password'] ?? '';
    $old['email'] = $email = $_POST['email'] ?? '';
    $old['phone'] = $phone = $_POST['phone'] ?? '';
    $old['date'] = $date = $_POST['date'] ?? '';
    $old['vehicle1'] = $_POST['vehicle1'] ?? '';
    $old['vehicle2'] = $_POST['vehicle2'] ?? '';
    $old['vehicle3'] = $_POST['vehicle3'] ?? '';
    $old['fav_language'] = $fav_language = $_POST['fav_language'] ?? '';

    $vehicle_bike = isset($_POST['vehicle1']) ? 1 : 0;
    $vehicle_car = isset($_POST['vehicle2']) ? 1 : 0;
    $vehicle_boat = isset($_POST['vehicle3']) ? 1 : 0;

    // Validation
    if (empty($username)) {
        $errors['username'] = 'Username is required';
    } elseif (strlen($username) < 3) {
        $errors['username'] = 'Username must be at least 3 characters long';
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required';
    } elseif (strlen($password) < 6) {
        $errors['password'] = 'Password must be at least 6 characters long';
    }

    if (empty($confirm_password)) {
        $errors['confirm_password'] = 'Confirm Password is required';
    } elseif ($confirm_password !== $password) {
        $errors['confirm_password'] = 'Passwords do not match';
    }

    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    if (empty($phone)) {
        $errors['phone'] = 'Phone number is required';
    } elseif (!preg_match('/^\d{10}$/', $phone)) {
        $errors['phone'] = 'Phone number must be 10 digits';
    }

    if (empty($date)) {
        $errors['date'] = 'Date is required';
    } elseif (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $date)) {
        $errors['date'] = 'Date must be in DD/MM/YYYY format';
    }

    if (empty($old['vehicle1']) && empty($old['vehicle2']) && empty($old['vehicle3'])) {
        $errors['vehicle'] = 'At least one vehicle must be selected';
    }

    if (empty($fav_language)) {
        $errors['fav_language'] = 'Favorite programming language is required';
    }



    if (empty($errors)) {
        // Registration successful, redirect or do whatever you want here

        $file_path = null;
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            $file_path = $target_file;
        }
    }
  
        $userData = [
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'phone' => $phone,
            'date_of_birth' => $date,
            'vehicle_bike' => $vehicle_bike,
            'vehicle_car' => $vehicle_car,
            'vehicle_boat' => $vehicle_boat,
            'fav_language' => $fav_language,
            'file_path' => $file_path
        ];

        $inserted = insertUser($userData);

    if ($inserted) {
        header('Location: ../view/login.php');
        exit;
    } else {
        $errors['db'] = "Database insertion failed.";
        include '../view/register.php';
        exit;
    }
    }
  
} else {
    // Show empty form on GET requests
    include '../view/register.php';
    exit;
}

