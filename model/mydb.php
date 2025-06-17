<?php

function getDB()
{
    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $dbname = "exam";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function insertUser($userData)
{
    $conn = getDB();
    
    $stmt = $conn->prepare("INSERT INTO users (username, password, email, phone, date_of_birth, vehicle_bike, vehicle_car, vehicle_boat, fav_language, file_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        return false;
    }

    $stmt->bind_param(
        "ssssssssss",
        $userData['username'],
        $userData['password'],
        $userData['email'],
        $userData['phone'],
        $userData['date_of_birth'],
        $userData['vehicle_bike'],
        $userData['vehicle_car'],
        $userData['vehicle_boat'],
        $userData['fav_language'],
        $userData['file_path']
    );

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}


function checkLogin($username, $password) {
    $conn = getDB(); // mysqli object

    // Simple plain text password check (not secure for real use)
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        return true;
    }
    return false;
}   


function updateUser($data) {
    $conn = getDB();

        $stmt = $conn->prepare(
            "UPDATE users SET 
                email = ?, 
                phone = ?, 
                date_of_birth = ?, 
                vehicle_bike = ?, 
                vehicle_car = ?, 
                vehicle_boat = ?, 
                fav_language = ?, 
                file_path = ? 
             WHERE username = ?"
        );

        $stmt->bind_param(
            "sssssssss",
            $data['email'],
            $data['phone'],
            $data['date_of_birth'],
            $data['vehicle_bike'],
            $data['vehicle_car'],
            $data['vehicle_boat'],
            $data['fav_language'],
            $data['file_path'],
            $data['username']
        );

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function deleteUser($id) {
        $conn = getDB();
    
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
    
        $success = $stmt->execute();
    
        $stmt->close();
        $conn->close();
    
        return $success;
    }
    



?>