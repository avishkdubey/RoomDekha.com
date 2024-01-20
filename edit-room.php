<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomId = $_POST['room_id'];
    $price = $_POST['price'];
    $person = $_POST['member'];
    $phone = $_POST['phone'];

    $updateQuery = "UPDATE room SET price = '$price', r_person = '$person', o_phone = '$phone' WHERE room_id = $roomId";

    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        echo 2; // Success
    } else {
        echo "Error: " . mysqli_error($conn); // Output the error message for debugging
    }
} else {
    echo "Invalid Request"; // Handle non-POST requests
}
