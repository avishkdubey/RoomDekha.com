<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['IS_LOGIN']) && !isset($_SESSION['USER_EMAIL'])) {
    header('location: home.php');
    exit;
}

$email = $_SESSION['USER_EMAIL'];
$gender = $_POST['gender'];

// Validate gender: allow only alphabets
if (preg_match('/^[A-Za-z]+$/', $gender)) {
    // Prepare and execute the SQL update query
    $stmt = $conn->prepare("UPDATE user SET u_gender = ? WHERE u_mail = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $gender, $email);

        if ($stmt->execute()) {
            echo '1'; // Update successful
        } else {
            echo '0'; // Update failed
        }

        $stmt->close();
    } else {
        echo '0'; // Statement preparation failed
    }
} else {
    echo '0'; // Invalid name format
}
