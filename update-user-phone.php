<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['IS_LOGIN']) && !isset($_SESSION['USER_EMAIL'])) {
    header('location: home.php');
    exit;
}

$email = $_SESSION['USER_EMAIL'];
$phone = $_POST['phone'];

// Validate phone: allow only 10 digits and numbers only
if (preg_match('/^[0-9]{10}$/', $phone)) {
    // Prepare and execute the SQL update query
    $stmt = $conn->prepare("UPDATE user SET u_phone = ? WHERE u_mail = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $phone, $email);

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
    echo '0'; // Invalid phone number format
}
