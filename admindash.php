<?php
session_start();
if (isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];

    // Your database connection code should be included here
    include("connection.php");

    $sel = "SELECT * FROM admin WHERE admin_email = '$admin_email'";
    $que = mysqli_query($conn, $sel) or die('Error');

    if (mysqli_num_rows($que) > 0) {
        $fetch = mysqli_fetch_assoc($que);
    }

    // Rest of your code that displays user information, etc.
} else {
    header('location: admin-login.php'); // Redirect to the home page or login page if the user is not logged in
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS\admin.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <!-- Include Bootstrap JavaScript and its dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</head>



<body>
    <!-- Navbar -->
    <nav class="navbar navbar-primary sticky-top p-1" style="background-color: #313949;">
        <div class="row">
            <a class="navbar-brand d-flex" href="admindash.php" style="color: black; margin-right:20px;">
                <h2 class="logo" style="color:white;"><ion-icon name="home-outline"></ion-icon></ion-icon>R<span style="color:rgb(248, 199, 110)">oo</span>mDekh<span style="color:rgb(248, 199, 110)">a</span>.com</h2>
            </a>
        </div>
        <div class="row">
            <a class="navbar-brand d-flex" href="admindash.php" style="color: black; margin-right:20px;">
                <h2 class="logo" style="color:white;">Admin Pannel</h2>
            </a>
        </div>
        <div class="menu-icon">
            <div class="container"><i class="fa-solid fa-bars fa-lg p-2" style="color: white;"></i></div>
            <div class="dropdown-menu">
                <a class="menu-item" href="#"><ion-icon name="people-outline"></ion-icon> Profile</a>
                <a class="menu-item" href="#"><ion-icon name="settings-outline"></ion-icon> Settings</a>
                <a class="menu-item" href="manage-team.html"><i class="fa fa-solid fa-people-group"></i> Manage Team</a>
                <a class="menu-item">
                    <form method="post" action="admin-logout.php">
                        <button type="submit" name="logout">Log Out</button>
                    </form>
                </a>


            </div>
        </div>
    </nav>

    <!-- Navbar -->
    <div class="container-fluid bg-light" style="width: 100%; padding-bottom:15rem;">
        <div class="row d-flex" id="quick-link">
            <span class="d-flex">
                <h5>Quick Links</h5>&nbsp;&nbsp;<i class="fa-solid fa-link fa-beat-fade fa-2xs mt-3 " style="color: #835DD4;"></i>
            </span>
        </div>
        <div class="row" style="margin-top: -25px;">
            <div class="card m-2 col-md upper-option" id="card">
                <a href="all-user.php">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2"><i class="fa-solid fa-money-bill-trend-up icon"></i></div>
                            <div class="col-md-10">USER DETAILS</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class=" card m-2 col-md upper-option" id="card">
                <a href="all-owner.php">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2"><i class="fa fa-solid fa-book icon"></i></div>
                            <div class="col-md-10">OWNER DETAIL</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class=" card m-2 col-md upper-option" id="card">
                <a href="all-room.php">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2"><i class="fa fa-solid fa-people-group icon"></i></div>
                            <div class="col-md-10">ROOM DETAIL</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="card m-2 col-md" id="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4"><i class="fa fa-solid fa-gear icon"></i></div>
                        <div class="col-md-8">BOOKING DETAIL</div>
                    </div>
                </div>
            </div>
            <div class="card m-2 col-md" id="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4"><i class="fa fa-solid fa-upload icon"></i></div>
                        <div class="col-md-8">PAYMENT DETAIL</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card m-2 col-md-2" id="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"><i class="fa fa-solid fa-gauge-high icon"></i></div>
                        <div class="col-md-10">FEEDBACK DETAIL</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">




</body>

</html>