<?php
session_start(); // Start the session (if not already started)

// Check if the user is logged in and wants to log out
if (isset($_SESSION['admin_email']) && isset($_POST['logout'])) {
    // Unset the admin_email session variable to destroy it
    unset($_SESSION['admin_email']);
    
    // Redirect the user to the admin login page
    header("Location: admin-login.php"); // Replace "admin-login.php" with the actual login page
    exit(); // Ensure that no more code is executed after the redirection
} else {
    // Handle the case where the user is not logged in or the form wasn't submitted properly
    header("Location: admin-login.php"); // Redirect to the login page for safety
    exit();
}
?>
