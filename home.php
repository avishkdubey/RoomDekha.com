<?php
session_start();
?>
<html>

<head>
    <title>ROOMDEKHO.COM</title>
    <link href="CSS/home.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="CSS/loader.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');

    #navbar {
        width: 100%;
        height: 75px;
        margin: auto;
        background-color: whitesmoke;
    }

    .icon {
        width: 30%;
        margin-top: 0px;
    }

    .menu {
        height: 75px;
        width: 70%;
        padding-left: 20px;
    }

    .ul {
        /* float: right; */
        display: flex;
        /* justify-content: center;
  align-items: center; */

    }

    #navbar ul li {
        list-style: none;
        display: inline-block;
        font-size: 20px;
        padding-left: 50px;
        /* margin-top: 27px; */
        /* position: relative; */
        font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
        color: black;
        padding-top: 13px;
    }

    #navbar ul li a {
        text-decoration: none;
        padding-right: 15px;
        padding-left: 15px;
        margin-top: 10px;
        margin-bottom: 10px;
        border-radius: 20px;
        color: black;
        padding: 8px;
    }

    #navbar ul li a:hover {
        background-color: rgb(248, 199, 110);

    }

    #navbar ul li button {
        font-size: 20px;
        padding: 8px;
        border: 1px solid black;
        background-color: rgb(248, 199, 110);
        border-radius: 10px;
        cursor: pointer;
    }


    .form-control {
        border-bottom: 1px solid #eee !important;
        border: none;
        font-weight: 600
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #8bbafe;
        outline: 0;
        box-shadow: none
    }

    .inputbox {
        position: relative;
        margin-bottom: 20px;
        width: 100%
    }

    .inputbox span {
        position: absolute;
        top: -2px;
        left: 11px;
        transition: 0.5s
    }

    .inputbox i {
        position: absolute;
        top: 13px;
        right: 8px;
        transition: 0.5s;
        color: #3F51B5
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0
    }

    .inputbox input:focus~span {
        transform: translateX(-0px) translateY(-15px);
        font-size: 12px
    }

    .inputbox input:valid~span {
        transform: translateX(-0px) translateY(-15px);
        font-size: 12px
    }

    .field_error {
        color: red;
        margin-top: 5px;
    }

    .form-submit {
        background: rgb(241, 178, 60);
        border: none;
        width: 70%;
        border-radius: 1px;
        color: #fff;
        padding: 12px;
        font-size: 12px;
        font-weight: bold;
        letter-spacing: 1px;
        text-transform: uppercase;
        cursor: pointer;
        transition: transform 80ms ease-in;
        text-align: center;
        justify-content: center;
        margin: auto;
    }

    #google {
        background-color: white;
        border: 1px solid lightgray;
        margin-top: 80px;
        border-radius: 50px;
        height: 6vh;
        padding: 5px 45px;
        cursor: pointer;
        transition: transform 80ms ease-in;
    }

    #google img {

        width: 4vh;
    }


    .text {
        height: 350px;
        width: 100%;
        background-color: whitesmoke;
        margin-top: 70px;
    }

    .text h1 {
        text-align: center;
        font-family: Georgia, 'Times New Roman', Times, serif;
        color: maroon;
        font-size: 45px;
        padding-top: 50px;

    }

    .text h3 {
        text-align: center;
        font-family: Georgia, 'Times New Roman', Times, serif;
        color: gray;
        padding-top: 2px;
    }

    .text p {
        text-align: center;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: black;
        font-size: 20px;
        padding-top: 40px;
        letter-spacing: 1px;
        margin-right: 160px;
        margin-left: 160px;
    }

    .moving {
        width: 100%;
        height: 500px;
        background-position: center;
        background-size: cover;
        background-image: url(images/moving1.webp);
        background-attachment: fixed;
        margin-top: 80px;
    }

    .first {
        width: 100%;
        height: 500px;
    }

    .second {
        width: 100%;
        height: 500px;
    }

    .second h1 {
        font-size: 40px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        color: whitesmoke;
        text-align: right;
        padding-top: 20px;
        letter-spacing: 1px;
        margin-right: 30px;

    }

    .second p {
        font-size: 20px;
        margin-right: 30px;
        padding-top: 30px;
        color: white;
        text-align: right;
        line-height: 40px;
    }

    .button-wrapper {
        margin-top: 18px;
    }

    .btn {
        border: none;
        padding: 12px 24px;
        border-radius: 24px;
        font-size: 12px;
        font-size: 0.8rem;
        letter-spacing: 2px;
        cursor: pointer;
    }

    .btn {
        margin-right: 30px;
        /* float:right; */
        margin-top: 20px;
        justify: center;
    }

    .outline {
        background: transparent;
        color: rgba(0, 212, 255, 0.9);
        border: 1px solid rgba(0, 212, 255, 0.6);
        transition: all .3s ease;

    }

    .outline:hover {
        transform: scale(1.125);
        color: rgba(255, 255, 255, 0.9);
        border-color: rgba(255, 255, 255, 0.9);
        transition: all .3s ease;
    }

    .fill {
        background: wheat;
        color: black;
        filter: drop-shadow(0);
        font-weight: bold;
        transition: all .3s ease;
    }

    .fill:hover {
        transform: scale(1.125);
        border-color: rgba(255, 255, 255, 0.9);
        filter: drop-shadow(0 10px 5px rgba(0, 0, 0, 0.125));
        transition: all .3s ease;
    }

    .heading1 {
        width: 100%;
        height: 80px;
        margin-top: 90px;
        /* background-color:whitesmoke; */
    }

    .heading1 h1 {
        font-size: 30px;
        color: black;
        font-family: 'Montserrat', sans-serif;
        letter-spacing: 1px;
        padding-top: 20px;
        text-align: center;
    }

    .heading2 {
        width: 100%;
        height: 80px;
        /* background-color:whitesmoke;*/
        margin-top: 80px;
    }

    .heading2 h1 {
        font-size: 30px;
        color: black;
        font-family: 'Montserrat', sans-serif;
        letter-spacing: 1px;
        padding-top: 20px;
        text-align: center;
    }

    .box {
        width: 80%;
        height: 300px;
        background-position: center;
        margin-left: 150px;
        margin-top: 30px;
        /* border:1px solid black; */
        text-align: center;
        transform: translate(400%);
        transition: transform 1s ease;
    }

    .box:nth-of-type(even) {
        transform: translateX(-400%);
    }

    .box.show {
        transform: translate(0);
    }

    .image {
        padding-top: 20px;
        /* padding-right:20px; */
        /* background-color: hsl(0, 8%, 92%); */
    }

    .info {
        height: 300px;
        background-color: whitesmoke;
        border: 1px solid wheat;
        background: cover;
        width: 100%;
    }

    .info h1 {
        font-family: cursive;
        padding-top: 60px;
    }

    .fills {
        background: wheat;
        color: black;
        filter: drop-shadow(0);
        font-weight: bold;
        transition: all .3s ease;
    }

    .fills:hover {
        transform: scale(1.125);
        border-color: rgba(255, 255, 255, 0.9);
        filter: drop-shadow(0 10px 5px rgba(0, 0, 0, 0.125));
        transition: all .3s ease;
    }

    article {
        --img-scale: 1.001;
        --title-color: black;
        --link-icon-translate: -20px;
        --link-icon-opacity: 0;
        position: relative;
        border-radius: 16px;
        box-shadow: none;
        background: #fff;
        transform-origin: center;
        transition: all 0.4s ease-in-out;
        overflow: hidden;
        margin-top: 60px;
        border: 1px solid gray;
    }

    article a::after {
        position: absolute;
        inset-block: 0;
        inset-inline: 0;
        cursor: pointer;
        content: "";
    }

    article h2 {
        margin: 0 0 18px 0;
        font-size: 1.9rem;
        letter-spacing: 0.06em;
        color: var(--title-color);
        transition: color 0.3s ease-out;
        font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
    }

    figure {
        margin: 0;
        padding: 0;
        aspect-ratio: 16 / 9;
        overflow: hidden;
    }

    article img {
        max-width: 100%;
        transform-origin: center;
        transform: scale(var(--img-scale));
        transition: transform 0.4s ease-in-out;
    }

    .article-body {
        padding: 24px;
    }

    article a {
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        color: #28666e;
    }

    article a:focus {
        outline: 1px dotted maroon;
    }

    article a .icon {
        min-width: 24px;
        width: 24px;
        height: 24px;
        margin-left: 5px;
        transform: translateX(var(--link-icon-translate));
        opacity: var(--link-icon-opacity);
        transition: all 0.3s;
    }

    article:has(:hover, :focus) {
        --img-scale: 1.1;
        --title-color: maroon;
        --link-icon-translate: 0;
        --link-icon-opacity: 1;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px,
            rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    .articles {
        display: grid;
        max-width: 1200px;
        margin-inline: auto;
        padding-inline: 24px;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 24px;
    }

    @media screen and (max-width: 960px) {
        article {
            container: card/inline-size;
        }

        .article-body p {
            display: none;
        }
    }

    @container card (min-width: 380px) {
        .article-wrapper {
            display: grid;
            grid-template-columns: 100px 1fr;
            gap: 16px;
        }

        .article-body {
            padding-left: 0;
        }

        figure {
            width: 80px;
            height: 100%;
            overflow: hidden;
        }

        figure img {
            height: 100%;
            aspect-ratio: 1;
            object-fit: cover;
        }
    }

    .sr-only:not(:focus):not(:active) {
        clip: rect(0 0 0 0);
        clip-path: inset(50%);
        height: 1px;
        overflow: hidden;
        position: absolute;
        white-space: nowrap;
        width: 1px;
    }

    .profile-picture-container {
        display: flex;
        justify-content: center;
        /* Horizontally center the content */
        align-items: center;
        /* Vertically center the content */
        height: 23vh;
        /* Adjust the height as needed */
    }

    .profile-picture {
        width: 150px;
        /* Set the desired width */
        height: 150px;
        /* Set the desired height */
        border-radius: 50%;
        overflow: hidden;
    }

    .profile-picture img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .container-fluids {
        flex-grow: 1;
    }

    footer {
        flex-shrink: 0;
    }

    li {
        list-style: none;
    }
</style>
<?php
include "connection.php";
// if login form is submitted
if (isset($_POST['login_o'])) {
    // retrieve form data
    $email = mysqli_real_escape_string($conn, $_POST['oemail']);
    $password = mysqli_real_escape_string($conn, $_POST['opass']);

    // query to retrieve staff data with provided email and password
    $query = mysqli_query($conn, "SELECT * FROM owner WHERE o_mail='$email' AND o_password='$password' LIMIT 1");

    $count = mysqli_num_rows($query);

    if ($count > 0) { // if staff exists with provided credentials
        $row = mysqli_fetch_assoc($query);
        $_SESSION['owner_id'] = $row['owner_id']; // create session for staff
        $_SESSION['USER_EMAIL'] = $email;
?>
        <script>
            location.replace("owner.php?adminid=<?php echo $_SESSION['owner_id'] ?> ");
        </script>
<?php
        exit();
    }
}

?>

<body>
    <div class="navbar sticky-lg-top" id="navbar">
        <div class="icon">
            <h2 class="logo"><ion-icon name="home-outline"></ion-icon></ion-icon>R<span style="color:rgb(248, 199, 110)">oo</span>mDekh<span style="color:rgb(248, 199, 110)">a</span>.com</h2>

        </div>
        <div class="menu">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="Flats.php">Flats</a></li>
                <li><a href="#aboutus">About Us</a></li>
                <li><a href="#popup1">Owner Login</a></li>
                <li><a href="#popup">User Login</a></li>
                <li><button><a href="partner.php">Add property</a></button></li>
            </ul>
        </div>
    </div>

    <div class="container-fluids p-0" style="position: relative; overflow: hidden; height:90%;">
        <video autoplay loop muted playsinline style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
            <source src="images\Fin.mp4" type="video/mp4">
        </video>
        <div class="container" style="text-align:center;">
            <h1 style="font-size:80px;color:darkgray;margin-top:180px;letter-spacing:6px;font-weight:bolder">Flats <span style="color:wheat">nearby</span> you</h1>
            <input type="text" style="width:300px;" placeholder="Search for your localites">
            <button style="font-size:20px;padding:10px;background-color:wheat;color:gray;border:1px solid gray;border-radius:10px;cursor:pointer;">Search</button>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6" style="margin-top:10vh; display:inline-block">
                <div class="m-5" style=" height: 50vh;">
                    <div class="card-body">
                        <h5 class="card-title text-center" style="margin-top: 5vh; margin-bottom: 5vh;font-family: 'Montserrat', sans-serif; letter-spacing: 2px; font-size: 2rem;font-weight:bold">Let's find the right<br> selling option for you</h5>
                        <p class="card-text" style="padding-top:30px;padding-left:16px;">As the complexity of buildings to increase, the field of architecture</p>
                        <ul style="margin-top:40px">
                            <li>
                                <p style="font-weight:bolder"><i class="fa fa-solid fa-check" style="color: #088000;"></i>&nbsp;&nbsp;&nbsp;Find excellent deals</p>
                            </li>
                            <li>
                                <p style="font-weight:bolder"><i class="fa fa-solid fa-check" style="color: #088000;"></i>&nbsp;&nbsp;&nbsp;Friendly host & Fast support</p>
                            </li>
                            <li>
                                <p style="font-weight:bolder"><i class="fa fa-solid fa-check" style="color: #088000;"></i>&nbsp;&nbsp;&nbsp;List your own property</p>
                            </li>
                        </ul>
                        <div class="row" id="join-btn" style="position: relative; z-index: 1;">
                            <a href="partner.php" target="blank" class="btn fill">Partner with us</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" style="margin-top:10vh; display:inline-block">
                <img src="images/sidehouse1.jpeg" height="300px" width="300px" style="display:inline-block;margin-top:100px;border-radius:10px">
                <img src="images/sidehouse2.jpeg" height="430px" width="350px" style="display:inline-block;border-radius:10px;padding-left:5px;">

            </div>
        </div>
    </div>


    <div class="heading" style="background-color:white">
        <h1><b>Featured <span style="color: gray;">r<span style="color:maroon;">oo</span>ms</span> recommendations
                for
                you</b></h1>
        <section class="container">
            <div class="image-container1" style="margin-left:140px">
                <div class="img-1">
                    <img style="height:200px;
                    width:325;" src="images/modern-living-room-decor-1366x768.webp" alt="">
                </div>
                <div class="img-head"><br> 1RK</div>
            </div>
            <div class="image-container1" style="padding-left:40px">
                <div class="img-1">
                    <img style="height:200px;
                    width:325;" src="images/room2.webp" alt="">
                </div>
                <div class="img-head"><br> 1BHK</div>
            </div>
            <div class="image-container1" style="padding-left:40px">
                <div class="img-1">
                    <img style="height:200px;
                    width:325;" src="images/room3.jpeg" alt="">
                </div>
                <div class="img-head"><br> 2BHK</div>
            </div>
        </section>

    </div>


    <div class="text">
        <h1>Virtual Tour</h1>
        <h3>Take a virtual tour before you book a room!</h3>
        <p> Looking for a perfect spot ,where one could blow off some steam and literally feel like at home is a demanding task that involves a great deal of
            tiresome decision making. With help comes our "virtual tour" guide. Search what you like and see for yourself whether you are pleased with available offers
            or wish to look for another alternative. As we always say "devil is in the detail".</p>
    </div>
    <div class="container-fluid moving" style="display:grid;">
        <div class="first" style="grid-column-start:0;grid-column-end:6;">
        </div>

        <div class="second" style="grid-column-start:6;grid-column-end:8;background-color:#00000080">
            <h1>Property you won't <br> find anywhere else</h1>
            <p>We will help you to save your efforts <br>to find a best room on your hands! <br>You can save your precious time <br>for finding a room. Join with us<br> and save your time and efforts.</p>

            <button style="font-size:20px;padding:10px;background-color:wheat;color:black;border-radius:20px;float:right;cursor:pointer;">Book now</button>
        </div>
    </div>

    <div class="container-fluid" id="aboutus" style="overflow:hidden">
        <div class="heading1">
            <h1>Take our reference</h1>
        </div>
        <!-- Divyansh box -->
        <div class="box" style="display:grid;">
            <div class="image" style="grid-column-start:0;grid-column-end:3;">
                <img src="images/divyansh.JPG" width="250px" height="200px" style="border-radius:50%;border:1px solid wheat">
            </div>

            <div class="info" style="grid-column-start:3;grid-column-end:8;">
                <h1>Divyansh Vyas</h1>
                <p>"We are here to help you find the best<br> rooms around you without any physical efforts and in lesser time!"</p>

                <button class="btn fills">LinkedIn</button>
            </div>
        </div>

        <!-- Abhishek box -->
        <div class="box" style="display:grid;">

            <div class="image" style="grid-column-start:0;grid-column-end:3;">
                <img src="images/Abhishek.png" width="250px" height="200px" style="border-radius:50%;border:1px solid wheat">
            </div>
            <div class="info" style="grid-column-start:3;grid-column-end:8;">
                <h1>Abhishek Dubey</h1>
                <p>"We are here to help you find the best<br> rooms around you without any physical efforts and in lesser time!"</p>
                <button class="btn fills">LinkedIn</button>
            </div>
        </div>
    </div>


    <div class="heading2">
        <h1>See How R<span style="color:rgb(248, 199, 110)">oo</span>mDekh<span style="color:rgb(248, 199, 110)">a</span>.com Can Help</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <article>
                    <div class="article-wrapper">
                        <div class="profile-picture-container">
                            <figure class="profile-picture">
                                <img src="images/houserent.jpg" alt="Profile Picture" />
                            </figure>
                        </div>
                        <hr>
                        <div class="article-body">
                            <div class="article-content">
                                <h2 style="text-align:center;"><span style="color:rgb(248, 199, 110)">Give</span> on Rent</h2>

                                <a href="#" class="read-more">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-4">
                <article>
                    <div class="article-wrapper">
                        <div class="profile-picture-container">
                            <figure class="profile-picture">
                                <img src="images/house-icon.jpeg" alt="Profile Picture" />
                            </figure>
                        </div>
                        <hr>
                        <div class="article-body">
                            <div class="article-content">

                                <h2 style="text-align:center;">Take <span style="color:rgb(248, 199, 110)">on</span> Rent</h2>

                                <a href="#" class="read-more">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-4">
                <article>
                    <div class="article-wrapper">
                        <div class="profile-picture-container">
                            <figure class="profile-picture">
                                <img src="images/camerahome.jpeg" alt="Profile Picture" />
                            </figure>
                        </div>
                        <hr>
                        <div class="article-body">
                            <div class="article-content">
                                <h2 style="text-align:center;">See what <span style="color:rgb(248, 199, 110)">we</span> meant</h2>

                                <a href="#" class="read-more">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="bg-dark text-center text-white" style="margin-top:80px">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f" style="font-size:30px"></i></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter" style="font-size:30px"></i></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google" style="font-size:30px"></i></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram" style="font-size:30px"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in" style="font-size:30px"></i></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github" style="font-size:30px"></i></a>
            </section>
            <!-- Section: Social media -->

            <!-- Section: Form -->
            <section class="">
                <form action="">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <!--Grid column-->
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>Sign up for our newsletter</strong>
                            </p>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-5 col-12">
                            <!-- Email input -->
                            <div class="form-outline form-white mb-4">
                                <input type="email" placeholder="Email address" id="form5Example21" class="form-control" />

                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-auto">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-outline-light mb-5" style="margin-top:-3px;">
                                Subscribe
                            </button>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </form>
            </section>

            <!-- Section: Form -->

            <!-- Section: Text -->
            <section class="mb-5">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
                    repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
                    eum harum corrupti dicta, aliquam sequi voluptate quas.
                </p>
            </section>
            <!-- Section: Text -->

            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Popular Searches</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">1BHK</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">2BHK</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">1RK</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">For Student</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Quick Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Terms of Use</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Privacy policy</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Our services</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">FAQs</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Discover</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Rooms</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Flats</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Villas</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Mantions</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Social media</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Instagram</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Facebook</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">LinkedIn</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Twitter</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="#">RoomDekha.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <div class="register" style="max-height:fit-content">
        <div id="popup" class="overlay">
            <div class="wrapper" style="border-radius:10px;">
                <a href="#" class="close" style="text-decoration: none;">&times;</a>
                <div class=" container column-details">
                    <div class="loader loader-double" style="width: 100%; height: inherit;"></div>
                    <div class="signin row">
                        <div class="col-md" style="margin-top: 20px;">
                            <!--------------------------------------------------LOGIN-FORM---------------------------------------------------------------------->
                            <form action="" method="post" id="form">

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
                                        <a type="button" id="google"><img src="images\icons8-google-48.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="second_box">
                                    <p style="margin-top:1px;">Enter OTP Received on Your Email</p>
                                    <div class="inputbox">
                                        <input type="text" id="otp" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 5);" required>
                                        <span>Enter OTP</span>
                                        <div class="field_error" id="otp_error"></div>
                                    </div>
                                    <div class="form-group row" style="text-align: center;">
                                        <div class="col-md-6"><button type="button" class="form-submit" onclick="submit_otp()">Verify</button></div>
                                        <div class="col-md-6" style=" margin-top: 20px;"><a href="" style="color: blue;">Resend OTP</a></div>

                                    </div>
                                </div>
                            </form>
                            <!-- ------------------------------------------------LOGIN-FORM---------------------------------------------------------------------->
                        </div>
                    </div>
                </div>
                <div class="column-content">
                    <div class="signin row">
                        <div class="col-md"><i class="fa-solid fa-house-circle-check fa-2xl" style="color: #8a0000;"></i>
                        </div>
                        <div class="col-md" style=" margin-top: 40px;" id="box-title">
                            <h1>Your Trusted</h1>
                            <h2><strong> R<span style="color:rgb(248, 199, 110)">oo</span>mDekh<span style="color:rgb(248, 199, 110)">a</span>.com </strong></h2>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <div class="register" style="max-height:fit-content">
        <div id="popup1" class="overlay">
            <div class="wrapper" style="border-radius:10px;">
                <a href="#" class="close" style="text-decoration: none;">&times;</a>
                <div class=" container column-details">
                    <div class="loader loader-double" style="width: 100%; height: inherit;"></div>
                    <div class="signin row">
                        <center>
                            <h2 style="color:maroon;">Owner Login</h2>
                        </center>
                        <div class="col-md" style="margin-top: 20px;">
                            <!--------------------------------------------------LOGIN-FORM---------------------------------------------------------------------->
                            <form method="post" id="form1">
                                <div class="first_box">
                                    <div class="inputbox">
                                        <input type="email" name="oemail" id="email2" class="form-control" required>
                                        <span>Email</span>
                                    </div>
                                    <div class="inputbox">
                                        <input type="password" name="opass" id="password2" class="form-control" required>
                                        <span>Password</span>
                                    </div>
                                    <div class="inputbox" style="text-align: right;">
                                        <button type="submit" name="login_o" style="background-color: #f8c76e;" class="btn btn-lg btn-primary">Login</button>
                                    </div>

                                </div>
                            </form>
                            <!-- ------------------------------------------------LOGIN-FORM---------------------------------------------------------------------->
                        </div>
                    </div>
                </div>
                <div class="column-content">
                    <div class="signin row">
                        <div class="col-md"><i class="fa-solid fa-house-circle-check fa-2xl" style="color: #8a0000;"></i>
                        </div>
                        <div class="col-md" style=" margin-top: 40px;" id="box-title">
                            <h1>Your Trusted</h1>
                            <h2><strong> R<span style="color:rgb(248, 199, 110)">oo</span>mDekh<span style="color:rgb(248, 199, 110)">a</span>.com </strong></h2>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <script>
        function send_otp() {
            $('.loader').addClass('is-active');
            var email = jQuery('#email').val();
            jQuery.ajax({
                url: 'send_otp.php',
                type: 'post',
                data: 'email=' + email,
                success: function(result) {
                    $('.loader').removeClass('is-active');
                    if (result.trim() === 'yes') {
                        $('#form')[0].reset();
                        // Show the second_box and hide the first_box
                        jQuery('.second_box').show();
                        jQuery('.first_box').hide();
                    } else if (result.trim() === 'not exists') {
                        $('#form')[0].reset();
                        jQuery('#email_error').html('Please enter a valid email!');
                    } else {
                        // Log unexpected results for debugging
                        console.log('Unexpected result:', result.trim());
                    }
                }
            });
        }

        function submit_otp() {
            var otp = jQuery('#otp').val();
            jQuery.ajax({
                url: 'check_otp.php',
                type: 'post',
                data: 'otp=' + otp,
                success: function(result) {
                    if (result.trim() === 'yes') {
                        $('#form')[0].reset();
                        window.location = 'Flats.php';
                    } else if (result.trim() === 'not_exist') {
                        $('#form')[0].reset();
                        jQuery('#otp_error').html('Please enter a valid OTP');
                    } else {
                        // Log unexpected results for debugging
                        console.log('Unexpected result:', result.trim());
                    }
                }
            });
        }

        // Additional script for toggling between signup and signin
        $(document).ready(function() {
            $('.signup').hide();

            $('#signin, #signup').on('click', function() {
                $('.signin, .signup').toggle();
            });

            // Checking boxes on scroll
            const boxes = document.querySelectorAll('.box');
            window.addEventListener('scroll', checkBoxes);
            checkBoxes();

            function checkBoxes() {
                const triggerBottom = window.innerHeight / 5 * 4;
                boxes.forEach(box => {
                    const boxTop = box.getBoundingClientRect().top;
                    if (boxTop < triggerBottom) {
                        box.classList.add('show');
                    } else {
                        box.classList.remove('show');
                    }
                });
            }
        });
    </script>
    <script>
        $('.signup').hide();

        $('#signin, #signup').on(
            'click',
            function() {
                $('.signin, .signup').toggle()
            }
        )
    </script>

    <script>
        const boxes = document.querySelectorAll('.box')
        window.addEventListener('scroll', checkBoxes)
        checkBoxes()


        function checkBoxes() {
            const triggerBottom = window.innerHeight / 5 * 4
            boxes.forEach(box => {
                const boxTop = box.getBoundingClientRect().top
                if (boxTop < triggerBottom) {
                    box.classList.add('show')
                } else {
                    box.classList.remove('show')
                }
            })
        }
    </script>

    <!-- <script>
        $(document).on('submit', '#form1', function(e) {
            e.preventDefault();
            $('.loader').addClass('is-active');
            $.ajax({
                url: "owner-login.php",
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    $('.loader').removeClass('is-active');

                    if (response == '1') {
                        $('#form1')[0].reset();
                        window.location = "owner.php";

                    } else if (response == '2') {

                        alert('Username or Password is wrong');

                    }
                },

            });
        });
    </script> -->


    <style>
        .second_box {
            display: none;
        }


        .field_error {
            color: red;
        }

        .list-unstyled li a {
            padding-top: 20px;
            /* Adjust the top padding as needed */
            padding-bottom: 20px;
            /* Adjust the bottom padding as needed */
            display: block;
            /* Ensure the entire <a> element is clickable */
            text-decoration: none;
            /* Remove underlines from links if needed */
        }
    </style>
</body>

</html>