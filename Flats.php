<?php
session_start();
if (!isset($_SESSION['IS_LOGIN']) && !isset($_SESSION['USER_EMAIL'])) {
    header('location: home.php');
    exit;
}
include "connection.php";
$user_email = $_SESSION['USER_EMAIL'];
$sel = "SELECT * FROM user where u_mail = '$user_email' ";
$que = mysqli_query($conn, $sel) or die('Error');
if (mysqli_num_rows($que) > 0) {
    $fetch = mysqli_fetch_assoc($que);
}

$login_row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE u_mail = '$_SESSION[USER_EMAIL]'"));
$query = "SELECT * FROM room";
$result = mysqli_query($conn, $query);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserDash</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

    <link rel="stylesheet" href="CSS/Flats.css?v=<?php echo time() ?>">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-lg-top stiky-offset">
        <!-- Container wrapper -->
        <div class="container-fluid" id="navbar">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <h3 style="font-size: 22px;"><ion-icon name="home-outline"></ion-icon></ion-icon>&nbsp;<strong>R<span style="color:rgb(248, 199, 110)">oo</span>mDekh<span style="color:rgb(248, 199, 110)">a</span>.com</strong>
                    </h3>
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li style="margin-left: 20px; margin-top: 6px;" class="nav-item">
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="list">
                    <li class="nav-item">
                        <a class="nav-link" href="Flats.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Flats.php">Properties</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>


        </div>

        <!-- Avatar -->
        <div class="sideprofile">
            <?php
            // Check if there is a profile picture in the database
            if (!empty($login_row['u_photo'])) {
                // Display the profile picture from the database
                echo '<img class="nav-link dropdown-toggle" src="Photos/' . $login_row['u_photo'] . '" height="50px" width="50px" style="border-radius:50px;border:2px solid #8000002e;cursor:pointer;  margin-right:30px;" class="user-pic" onclick="toggleMenu()">';
            } else {
                echo '<img class="nav-link dropdown-toggle" src="images/user.jpg" height="50px" width="50px" style="border-radius:50px;border:2px solid #8000002e;cursor:pointer;  margin-right:30px;" class="user-pic" onclick="toggleMenu()">';
            }
            ?>
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <?php
                        // Check if there is a profile picture in the database
                        if (!empty($login_row['u_photo'])) {
                            // Display the profile picture from the database
                            echo '<img width="40px" src="Photos/' . $login_row['u_photo'] . '" style="border-radius: 50%;" class="user-pic">';
                        } else {
                            // Display the default profile picture
                            echo '<img width="40px" src="images/user.jpg" style="border-radius: 50%;" class="user-pic">';
                        }
                        ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <h3 style="<?php echo ($login_row['u_name'] !== null && $login_row['u_name'] !== '') ? '' : 'font-size: 14px; ' ?>">
                            <?php
                            if ($login_row['u_name'] !== null && $login_row['u_name'] !== '') {
                                echo $login_row['u_name'];
                            } else {
                                echo "<span style='font-size: 14px; color:lightgray;'>Update your name</span>";
                            }
                            ?>
                        </h3>
                    </div>


                    <hr>

                    <a href="user-profile.php" class="sub-menu-link">
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
                    <a href="partner.php" target="blank" class="sub-menu-link">
                        <i class="fa fa-regular fa-handshake" style="color: #000000;"></i>
                        <p>Join with us &nbsp;&nbsp;&nbsp;<span><i class="fa fa-solid fa-face-grin-wide" style="color: #ffea00;"></i></span></p>
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
    <div class="row">
        <div class="col-md">
            <div class="nav2 navbar">
                <ul>
                    <select name="bhk-type" id="list2">
                        <option value="">BHK Type</option>
                        <option value="">1 RK</option>
                        <option value="">2 BHK</option>
                        <option value="">3 BHK</option>
                    </select>
                    <select name="price" id="list2">
                        <option value="">Price</option>
                        <option value="">2000-5000</option>
                        <option value="">5000-7000</option>
                        <option value="">7000-12000</option>
                    </select>
                </ul>


            </div>
        </div>
    </div>
    <div class="container-fluid mt-5 bg-light">
        <div class="row">
            <div class="col-md-8" style="height: 80vh; overflow-y: scroll; scroll-snap-type: inherit;" id="left-div">
                <?php
                while ($rooms = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="card m-5" style="max-width: 130vh;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="Photos/<?php echo $rooms['r_image1']; ?>" style="height:100%;" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Price on Request</h5>
                                    <h6 class="card-title"><?php echo $rooms['r_address']; ?></h6>
                                    <h6 class="card-text text-muted" style="font-size: small;">RoomDekho Group</h6>
                                    <h6 class="card-text" style="font-size: small;"><?php echo $rooms['room_type']; ?> Flat <span class="text-muted">for
                                            sales in <?php echo $rooms['r_city']; ?></span></h6>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <a href="quickview.php?room_id=<?php echo $rooms['room_id']; ?>" class="btn btn-warning btn ms-2">View Property</a>
                                        </div>
                                        <a href="quickview.php?room_id=<?php echo $rooms['room_id']; ?>" class="col-md-4"><button type="submit" class="btn btn-warning btn ms-2">Contact Details</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="col-md-4" style="height:80vh;">
                <div class="card bg-dark text-white m-5">
                    <img src="images/homewallpaper.jpeg" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Demo Add</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="card-text">Last updated 3 mins ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>


</body>

</html>