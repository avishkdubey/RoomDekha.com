<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Store the form data in the session
    // $_SESSION['name'] = $name;
    // $_SESSION['dob'] = $dob;
    // $_SESSION['email'] = $email;
    // $_SESSION['pass'] = $pass;
    // $_SESSION['phone'] = $phone;
    // $_SESSION['address'] = $address;

    // The rest of your code...
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Suscription</title>
</head>
<style>
    #rzp-button1 {
        display: none;
    }
</style>

<body>
    <div>
        <form id="ownerForm" method="POST" action="insert-owner.php">
            <input type="hidden" name="oname" value="<?php echo htmlspecialchars($name); ?>">
            <input type="hidden" name="odob" value="<?php echo htmlspecialchars($dob); ?>">
            <input type="hidden" name="oemail" value="<?php echo htmlspecialchars($email); ?>">
            <input type="hidden" name="opass" value="<?php echo htmlspecialchars($pass); ?>">
            <input type="hidden" name="ophone" value="<?php echo htmlspecialchars($phone); ?>">
            <input type="hidden" name="oaddress" value="<?php echo htmlspecialchars($address); ?>">
            <input type="hidden" name="tid" id="tid" value="">



        </form>

    </div>
</body>

</html>
<!-- <button id="rzp-button1">Pay</button> -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "rzp_test_npd4NYbUdZ1gXE", // Enter the Key ID generated from the Razorpay Dashboard
        "amount": "10000", // Amount is in currency subunits. Default currency is INR. Hence, 10000 refers to 100 INR.
        "currency": "INR",
        "name": "RoomDekha.com",
        "description": "Pay To RoomDekha.com",
        "image": "images/house-icon.jpeg",
        "handler": function(response) {
            if (response.razorpay_payment_id) {
                var tid = response.razorpay_payment_id;
                document.getElementById("tid").value = tid;
                document.getElementById("ownerForm").submit();
            }
        },
        "prefill": {
            "name": "User Name",
            "email": "username@example.com",
            "contact": "9995632456"
        },
        "notes": {
            "address": "RoomDekha.com Corporate Office"
        },
        "theme": {
            "color": "#e6be47"
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
    rzp1.on('payment.failed', function(response) {
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
    });
    document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>