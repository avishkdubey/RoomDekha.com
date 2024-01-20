<?php
session_start();
include("connection.php");

if (isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Validate the user's date of birth
    $birthdate = new DateTime($dob);
    $currentDate = new DateTime();
    $age = $currentDate->diff($birthdate)->y;

    if ($age < 18) {
        echo "Age is less than 18"; // Return an error message to indicate that the user is under 18.
    } else {
        $insertquery = "INSERT INTO owner (o_name, o_phone, o_mail, o_password, o_address, o_dob) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertquery);
        $stmt->bind_param("ssssss", $name, $phone, $email, $pass, $address, $dob);

        if ($stmt->execute()) {
            $_SESSION['USER_EMAIL'] = $email;

            // Show an alert message with JavaScript
            echo "<script>alert('Congratulations🥳 Welcome to RoomDekha.com Family.');</script>";

            // Redirect after a delay using JavaScript
            echo "<script>
                setTimeout(function() {
                    window.location.href = 'home.php';
                }, 3000); // 3000 milliseconds (1 seconds) delay
            </script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>
