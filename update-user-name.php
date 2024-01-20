<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['IS_LOGIN']) && !isset($_SESSION['USER_EMAIL'])) {
    header('location: home.php');
    exit;
}

$email = $_SESSION['USER_EMAIL'];
$name = $_POST['name'];

// Validate name: allow only alphabets and spaces
if (preg_match('/^[A-Za-z\s]+$/', $name)) {
    // Prepare and execute the SQL update query
    $stmt = $conn->prepare("UPDATE user SET u_name = ? WHERE u_mail = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $name, $email);

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
?>
