<?php
session_start();
include 'connection.php';

$otp = $_POST['otp'];
$email = $_SESSION['EMAIL'];

if (preg_match('/^\d{5}$/', $otp)) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE u_mail = ? AND OTP = ?");
    $stmt->bind_param("si", $email, $otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        mysqli_query($conn, "update user set OTP='' where u_mail='$email'");
        $_SESSION['IS_LOGIN'] = true; // Set a session flag indicating the user is logged in
        $_SESSION['USER_EMAIL'] = $email; // Store user email in session
        echo 'yes';
    } else {
        echo 'not_exist';
    }
} else {
    echo 'not_exist'; // Invalid OTP format
}
