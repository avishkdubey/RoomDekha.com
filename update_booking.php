<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['userid'];
    $room = $_POST['roomid'];

    $updateQuery = "UPDATE room SET user_id = '$user', booking = '0' WHERE room_id = $room";

    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        echo "1"; // Success
    } else {
        echo "0"; // Error
    }
} else {
    echo "Invalid Request"; // Handle non-POST requests
}
