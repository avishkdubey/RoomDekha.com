<?php
session_start();
include 'connection.php';

$email = $_POST['oemail'];
$pass = $_POST['opass'];



$checkQuery = "SELECT * FROM owner WHERE o_mail = $email AND o_password = $pass";
$result =mysqli_query($conn, $checkQuery);

if ($result) {
    $_SESSION['USER_EMAIL'] = $email;
    echo '1';
} else {
    echo '2';
}
