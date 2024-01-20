<?php
include('config.php');

$login_button = '';


if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


    if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);


        $_SESSION['access_token'] = $token['access_token'];


        $google_service = new Google_Service_Oauth2($google_client);


        $data = $google_service->userinfo->get();


        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}


if (!isset($_SESSION['access_token'])) {

    $login_button = '<a href="' . $google_client->createAuthUrl() . '"><img src="images/icons8-google-48.png"></a>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="first_box">
        <div class="inputbox">
            <input type="email" name="email" id="email" class="form-control" required>
            <span>Email</span>
            <div class="field_error" id="email_error"></div>
        </div>
        <div class="form-group row" style="text-align: center;">
            <button type="button" class="form-submit" onclick="send_otp()">Continue</button>
        </div>

        <div class="row" style="text-align: center; margin-top: 50px;">
            <span style="font-size: smaller; color: lightgray;">________or connect
                with________</span>
        </div>
        <div class="row" style="text-align: center; padding: 10px; display:inline;">
            <button type="button" id="google">
                <?php
                if ($login_button == '') {
                    echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                    echo '<img src="' . $_SESSION["user_image"] . '" class="img-responsive img-circle img-thumbnail" />';
                    echo '<h3><b>Name :</b> ' . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . '</h3>';
                    echo '<h3><b>Email :</b> ' . $_SESSION['user_email_address'] . '</h3>';
                    echo '<h3><a href="logout.php">Logout</h3></div>';
                } else {
                    echo '<div align="center">;' . $login_button . '</div>';
                }
                ?>
            </button>
        </div>
    </div>
</body>

</html>