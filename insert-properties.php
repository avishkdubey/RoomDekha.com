<?php
include 'connection.php';

$oid = $_POST['o_id'];
$house_no = $_POST['housenumber'];
$address = $_POST['address'];
$state = $_POST['state'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$ward = $_POST['ward'];
$tel = $_POST['mnumber'];
$roomtype = $_POST['roomType'];
$rent = $_POST['rent'];
$personAllowed = $_POST['personAllowed'];
$description = $_POST['description'];

$allowedFileTypes = ['image/jpeg', 'image/png',];
$maxFileSize = 10 * 1024 * 1024;

$file = $_FILES['image'];
$filename = $file['name'];
$filepath = $file['tmp_name'];
$fileerror = $file['error'];

if ($fileerror == 0) {
    $destfile = 'Photos/' . $filename;
    move_uploaded_file($filepath, $destfile);
}

$file1 = $_FILES['image1'];
$filename1 = time() . '_' . $file1['name'];
$filepath1 = $file1['tmp_name'];
$fileerror1 = $file1['error'];

if ($fileerror1 == 0) {
    $destfile1 = 'Photos/' . $filename1;
    move_uploaded_file($filepath1, $destfile1);
} else {
    echo 'Error uploading image1.';
    exit;
}

$file2 = $_FILES['image2'];
$filename2 = time() . '_' . $file2['name'];
$filepath2 = $file2['tmp_name'];
$fileerror2 = $file2['error'];

if ($fileerror2 == 0) {
    $destfile2 = 'Photos/' . $filename2;
    move_uploaded_file($filepath2, $destfile2);
} else {
    echo 'Error uploading image2.';
    exit;
}

$file3 = $_FILES['image3'];
$filename3 = time() . '_' . $file3['name'];
$filepath3 = $file3['tmp_name'];
$fileerror3 = $file3['error'];

if ($fileerror3 == 0) {
    $destfile3 = 'Photos/' . $filename3;
    move_uploaded_file($filepath3, $destfile3);
} else {
    echo 'Error uploading image3.';
    exit;
}

$checkqueryhouse = "SELECT * FROM room WHERE house_no = ?";
$stmt = $conn->prepare($checkqueryhouse);
$stmt->bind_param("s", $house_no);
$stmt->execute();
$checkresulthouse = $stmt->get_result();

if (mysqli_num_rows($checkresulthouse) > 0) {
    echo 1;
} else {
    $insertquery = "INSERT INTO room(owner_id,room_type, r_address, house_no, price, r_description, r_person, ward_no, r_state, r_city, o_phone, r_image1, r_image2, r_image3, r_image4) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
    $stmt = $conn->prepare($insertquery);

    $stmt->bind_param("sssssssssssssss",$oid, $roomtype, $address, $house_no, $rent, $description, $personAllowed, $ward, $state, $city, $tel, $filename, $filename1, $filename2, $filename3);

    $res = $stmt->execute();
    if ($res) {
        echo 2;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
