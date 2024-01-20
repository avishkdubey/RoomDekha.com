<?php
session_start();
if (isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];

    // Your database connection code should be included here
    include("connection.php");

    $sel = "SELECT * FROM room";
    $que = mysqli_query($conn, $sel) or die('Error');

    // Create an array to store the fetched data
    $data = array();

    if (mysqli_num_rows($que) > 0) {
        while ($row = mysqli_fetch_assoc($que)) {
            $data[] = $row;
        }
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
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Room</th>
                    <th scope="col">Type</th>
                    <th scope="col">Price</th>
                    <th scope="col">Members</th>
                    <th scope="col">Ward no.</th>
                    <th scope="col">House no.</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">State</th>
                    <th scope="col">City</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Manage</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><img src="<?php echo "Photos/" . $row['r_image1']; ?>" width="100" height="100"></td>
                        <td><?php echo $row['room_type'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['r_person'] ?></td>
                        <td><?php echo $row['ward_no'] ?></td>
                        <td><?php echo $row['house_no'] ?></td>
                        <td><?php echo $row['r_address'] ?></td>
                        <td>
                            <?php if ($row['is_available'] == 0) {
                                echo "vaccant";
                            } else {
                                echo "Booked";
                            } ?>
                        </td>
                        <td><?php echo $row['r_state'] ?></td>
                        <td><?php echo $row['r_city'] ?></td>
                        <td><?php echo $row['o_phone'] ?></td>
                        <td>
                            <button id="b1" type="button" class="btn btn-outline-success m-2 launch edit-room" style="width: 10vh;" data-toggle="modal" data-target="#editRoomModal" data-roomid="<?php echo $row['room_id']; ?>">Edit</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">




</body>

</html>