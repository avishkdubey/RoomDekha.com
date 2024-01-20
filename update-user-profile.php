<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['IS_LOGIN']) && !isset($_SESSION['USER_EMAIL'])) {
    header('location: home.php');
    exit;
}

$email = $_SESSION['USER_EMAIL'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $allowedFileTypes = ['image/jpeg', 'image/png'];
    if (!in_array($_FILES['profile']['type'], $allowedFileTypes)) {
        echo 'Invalid file type. Allowed types are: JPEG and PNG.';
        exit;
    }
    
    $maxFileSize = 2 * 1024 * 1024; // 2MB
    if ($_FILES['profile']['size'] > $maxFileSize) {
        echo 'File size exceeds the allowed limit (2MB).';
        exit;
    }
    
    $file = $_FILES['profile'];
    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];
    
    if ($fileerror == 0) {
        $destfile = 'Photos/' . $filename;
        if (move_uploaded_file($filepath, $destfile)) {
            $stmt = $conn->prepare("UPDATE user SET u_photo = ? WHERE u_mail = ?");
            if ($stmt) {
                $stmt->bind_param("ss", $filename, $email);
                if ($stmt->execute()) {
                    echo '1'; // Update successful
                } else {
                    echo '2';
                }
            } else {
                echo '3';
            }
        } else {
            echo '4';
        }
    } else {
        echo '5';
    }
} else {
    echo '6';
}
