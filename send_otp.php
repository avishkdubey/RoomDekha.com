
<?php 
session_start();
include 'connection.php';

$email = $_POST['email'];
$emailPattern = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';

if (!preg_match($emailPattern, $email)) {
    echo 'not exists'; // Invalid email format
} else {
    $stmt = $conn->prepare("SELECT * FROM user WHERE u_mail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['EMAIL'] = $email;
        $otp = rand(11111, 99999);

        $res1 = mysqli_query($conn, "update user set OTP='$otp' where u_mail='$email'");
        if ($res1) {
            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            $mail->Username = 'roomdekha.com@gmail.com';
            $mail->Password = 'okjm kayr fjes krgq';

            $mail->setFrom('roomdekha.com@gmail.com', 'RoomDekho.com');
            $mail->addAddress($_POST["email"]);

            $mail->isHTML(true);
            $mail->Subject = "Your One Time Password";
            $mail->Body = "<p>Dear user, </p> <h3>Your OTP code is $otp <br></h3>
                <br><br>
                <p>With regards,</p>
                <b>RoomDekho.Com</b>
                Thank you..";
            if (!$mail->Send()) {
                echo 'not exists'; // Email sending failed
            } else {
                echo 'yes'; // Email sending successful
            }
        }
    } else if ($result->num_rows == 0) {
        $_SESSION['EMAIL'] = $email;
        $otp = rand(11111, 99999);

        $res2 = mysqli_query($conn, "INSERT INTO user(u_mail) VALUES ('$email')");
        $res3 = mysqli_query($conn, "update user set OTP='$otp' where u_mail='$email'");
        if ($res2 && $res3) {
            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            $mail->Username = 'roomdekha.com@gmail.com';
            $mail->Password = 'iqemouhdjfjgnhfh';

            $mail->setFrom('roomdekha.com@gmail.com', 'RoomDekho.com');
            $mail->addAddress($_POST["email"]);

            $mail->isHTML(true);
            $mail->Subject = "Your One Time Password";
            $mail->Body = "<p>Dear user, </p> <h3>Your OTP code is $otp <br></h3>
                <br><br>
                <p>With regards,</p>
                <b>RoomDekho.Com</b>
                Thank you..";
            if (!$mail->Send()) {
                echo 'not exists'; // Email sending failed
            } else {
                echo 'yes'; // Email sending successful
            }
        }
    } else {
        echo 'not exists'; // Email not registered
    }
}