<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['IS_LOGIN']) && !isset($_SESSION['USER_EMAIL'])) {
    header('location: home.php');
    exit;
}

$emailu = $_SESSION['USER_EMAIL'];
$email = $_POST['email'];

// Validate gender: allow only alphabets
if (preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $emailu)) {
    // Prepare and execute the SQL update query
    $stmt = $conn->prepare("UPDATE user SET u_mail = ? WHERE u_mail = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $emailu, $email);

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
