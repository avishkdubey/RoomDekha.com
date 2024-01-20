<?php
session_start();
if (!isset($_SESSION['owner_id'])) {
    header('location: home.php');
    exit;
}
include "connection.php";
$sel = "SELECT * FROM owner WHERE owner_id = {$_SESSION['owner_id']}";
$que = mysqli_query($conn, $sel) or die('Error');

if (mysqli_num_rows($que) > 0) {
    $fetch = mysqli_fetch_assoc($que);
}

$owner_id = $_SESSION['owner_id'];
$login_row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM owner WHERE owner_id = '$owner_id'"));

$query5 = mysqli_query($conn, "SELECT u_name, u_mail, u_phone, room_id, booking, u_photo FROM user, room, owner WHERE user.user_id = room.user_id AND owner.owner_id = room.owner_id");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="CSS/loader.css">
    <link rel="stylesheet" href="CSS/booking-reqq.css">
    <title>Booking</title>
</head>

<body>
    <div class="loader loader-double" style="width: 100%; height: inherit;"></div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-lg-top stiky-offset">
        <div class="container-fluid" id="navbar">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <h3 style="font-size: 22px;"><ion-icon name="home-outline"></ion-icon></ion-icon>&nbsp;RoomDekho.com
                    </h3>
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li style="margin-left: 20px; margin-top: 6px;" class="nav-item">
                        <a onclick="toggleNav()"><i class="fa fa-thin fa-bars fa-xl" style="color: #000000;"></i></a>


                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="list">
                    <li class="nav-item">
                        <a class="nav-link" href="Owner.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Addproperty.html">Properties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <div class="sideprofile">
            <img class="nav-link dropdown-toggle" src="images/user.jpg" height="50px" width="50px" style="border-radius:50px;border:2px solid #8000002e;cursor:pointer;  margin-right:30px;" class="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img width="40px" src="images/user.jpg" style="border-radius:50px;" class="user-pic">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h3><?= $login_row['o_name']; ?></h3>
                    </div>
                    <hr>
                    <a href="owner-profile.php" class="sub-menu-link">
                        <i class="fas fa-user"></i>
                        <p>Profile</p>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <i class="fa-solid fa-bookmark" style="color: #000000;"></i>
                        <p>Bookings</p>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <i class="fa fa-solid fa-building" style="color: #000000;"></i>
                        <p>Saved properties list</p>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <i class="fa fa-regular fa-comments" style="color: #000000;"></i>
                        <p>Reviews</p>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    <a href="user-logout.php" class="sub-menu-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-md-2 bg-white" id="side-nav">
                <div href="#submenu1" data-bs-toggle="collapse" class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu" style="transition: 0.5s;">
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"><i class="fa fa-thin fa-house-user fa-xl">&nbsp;</i>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline"><i class="fa fa-thin fa-comments fa-xl"></i>&nbsp;Message</span> </a>
                        </li>

                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <h3 style="color: #000000; font-size: medium;margin-top:30px;margin-bottom:10px;color:gray;">
                                MANAGE LISTINGS</h3>
                            <li class="w-100">
                                <a href="Addproperty.html" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="fa fa-thin fa-tag fa-xl"></i></i>&nbsp;Add new
                                        property</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="fa fa-thin fa-hand fa-xl"></i>&nbsp;My
                                        properties</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="fa fa-solid fa-building" style="color: #000000;"></i>&nbsp;Other
                                        properties</span>
                                </a>
                            </li>
                        </ul>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <span class="ms-1 d-none d-sm-inline"><i class="fa fa-thin fa-envelope fa-xl"></i>&nbsp;Reviews</span></a>
                        </li>
                        <h3 style="color: #000000; font-size: medium;margin-top:30px;margin-bottom:10px;color:gray">
                            MANAGE ACCOUNT</h3>
                        <li class="w-100">
                            <a href="owner-profile.php" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="fa fa-thin fa-user fa-xl"></i>&nbsp;My Profile</span>
                            </a>
                        </li>
                    </ul>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <span class="ms-1 d-none d-sm-inline">Reviews</span></a>
                    </li>
                    </ul>
                </div>
            </div>


            <div class="col-md-10" id="dashboard">
                <div class=" container py-3 bg-light" style="width: 170vh;">

                    <div style="margin-left:34px;" class="main__title">
                        <div class="main__greeting">

                            <h1>Requests!
                            </h1>
                            <p>

                            </p><br>
                            <p>These Person Trying To Book Your Property</p>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <?php
                            while ($row5 = mysqli_fetch_assoc($query5)) {
                            ?>
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <center class="p-2">
                                            <?php
                                            if (!empty($row5['u_photo'])) {
                                                // Display the profile picture from the database
                                                echo '<img style="border-radius:50%; width:50%;" class="card-img-top" src="Photos/' . $row5['u_photo'] . '" alt="User Picture" />';
                                            } else {
                                                // Display the default profile picture
                                                echo '<img class="card-img-top" src="images/user.jpg" alt="User Picture" />';
                                            }
                                            ?>
                                        </center>
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $row5['u_name']; ?> </h5>
                                            <p class="card-text"><span class="text-muted">Trying To Book Your Property🏘️ <br> ID : <?= $row5['room_id']; ?></span></p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Email : <?= $row5['u_mail']; ?></li>
                                            <li class="list-group-item">Contact : <?= $row5['u_phone']; ?></li>
                                        </ul>
                                        <div class="card-body">
                                            <center>
                                                <?php
                                                // Assuming $booking_value contains the booking value from the room table
                                                if ($row5['booking'] == 0) {
                                                    echo '<h6><span style="font-weight:800;">Status :</span><span style="color:red; font-weight:800;">&nbsp;&nbsp;Pending⏳</span></h6>';
                                                } elseif ($row5['booking'] == 1) {
                                                    echo '<h6><span style="font-weight:800;">Status :</span><span style="color:green; font-weight:800;">&nbsp;&nbsp;Approved😄</span></h6>';
                                                }
                                                ?>
                                            </center>
                                            <center>
                                                <?php
                                                // Assuming $booking_value contains the booking value from the room table
                                                if ($row5['booking'] == 0) {
                                                    echo '
    <form action="" id="update_status">
        <input type="number" name="roomid" style="display: none;" value="' . $row5['room_id'] . '">
        <button id="bookNowButton" type="submit" class="status-button btn btn-success mt-3">Approve</button>
    </form>';
                                                } elseif ($row5['booking'] == 1) {
                                                    echo '<form action="" id="update_status2">
        <input type="number" name="roomid" style="display: none;" value="' . $row5['room_id'] . '">
        <p><button id="bookNowButton" type="submit" class="status-button btn btn-danger mt-3">Cancel</button></p>
    </form>';
                                                }
                                                ?>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>


                        </div>

                    </div>
                </div>
            </div>




            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <!-- Include Bootstrap JS and jQuery -->
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


            <script>
                let sideNavOpen = false;

                function toggleNav() {
                    const sideNav = document.getElementById("side-nav");
                    const subMenu = document.getElementById("submenu1");

                    if (sideNavOpen) {
                        sideNav.style.width = "0";
                        subMenu.style.display = "none";
                        sideNavOpen = false;
                    } else {
                        sideNav.style.width = "250px";
                        subMenu.style.display = "block";
                        sideNavOpen = true;
                    }
                }
            </script>









            <script>
                let subMenu = document.getElementById("subMenu");

                function toggleMenu() {
                    subMenu.classList.toggle("open-menu");
                }
            </script>
            <script>
                function closeNav() {
                    document.getElementById("side-nav").style.width = "0px";
                    document.getElementById("menu").style.width = "0px";
                    document.getElementById("menu").style.overflow = "hidden";
                    document.getElementById("main").style.display = "block";
                    document.getElementById("opennav").style.display = "block";


                }

                function openNav() {
                    document.getElementById("side-nav").style.width = "250px"; // Set a valid width value
                    document.getElementById("menu").style.width = "auto";
                    document.getElementById("menu").style.overflow = "hidden";
                    document.getElementById("main").style.display = "grid";
                    document.getElementById("closenav").style.display = "block";
                    document.getElementById("opennav").style.display = "none";

                }
            </script>
            <script>
                $(document).on('submit', '#update_status', function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "update-status.php",
                        type: "post",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function(response) {

                            if (response == '1') {

                                alert("Approved Successfully..");
                                window.location.reload();

                            } else if (response == '2') {

                                alert('Error');
                            }
                        },
                    });
                });
            </script>
            <script>
                $(document).on('submit', '#update_status2', function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "update-status2.php",
                        type: "post",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function(response) {

                            if (response == '1') {

                                alert("canceled Successfully..");
                                window.location.reload();

                            } else if (response == '2') {

                                alert('Error');
                            }
                        },
                    });
                });
            </script>

</body>

</html>