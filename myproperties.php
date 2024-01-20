<?php
session_start();
if (isset($_SESSION['USER_EMAIL'])) {
    $user_email = $_SESSION['USER_EMAIL'];

    // Your database connection code should be included here
    include("connection.php");

    $sel = "SELECT * FROM owner WHERE o_mail = '$user_email'";
    $que = mysqli_query($conn, $sel) or die('Error');

    if (mysqli_num_rows($que) > 0) {
        $fetch = mysqli_fetch_assoc($que);
    }

    // Rest of your code that displays user information, etc.
} else {
    header('location: home.php'); // Redirect to the home page or login page if the user is not logged in
    exit;
}

$query = "SELECT * FROM room WHERE owner_id = " . $fetch['owner_id'];

$result = mysqli_query($conn, $query);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="CSS\loader.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="CSS/myproperties.css">
    <title>My Properties</title>
</head>

<body>
    <!-- Navbar -->
    <div class="loader loader-double"></div>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h3>Divyansh Vyas</h3>
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
                    <a href="#" class="sub-menu-link">
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
                            <a href="owner.html" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"><i class="fa fa-thin fa-house-user fa-xl">&nbsp;</i>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline"><i class="fa fa-thin fa-comments fa-xl"></i>&nbsp;Request</span> </a>
                        </li>

                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <h3 style="color: #000000; font-size: medium;margin-top:30px;margin-bottom:10px;color:gray;">
                                MANAGE LISTINGS</h3>
                            <li class="w-100">
                                <a href="Addproperty.php" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="fa fa-thin fa-tag fa-xl"></i></i>&nbsp;Add new
                                        property</span>
                                </a>
                            </li>
                            <li>
                                <a href="myproperties.php" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="fa fa-thin fa-hand fa-xl"></i>&nbsp;My
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
                <div class=" container py-3 bg-light">

                    <div style="margin-left:34px;" class="main__title">
                        <div class="main__greeting">

                            <h1>Hey, Abhishek!
                            </h1>
                            <p>

                            </p><br>
                            <p>Your Properties, you added recently....</p>
                        </div>
                    </div>
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
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
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
                                        <td><button id="b1" type="button" class="btn btn-outline-success m-2 launch edit-room" style="width: 10vh;" data-toggle="modal" data-target="#staticBackdrop" data-roomid="<?php echo $row['room_id']; ?>">Edit</button>
                                            <!-- <button class="btn btn-outline-danger m-2" style="width: 10vh;">Delete</button> -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>




                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card-header d-flex justify-content-end">
                        <i class="fa fa-close close float-right" data-dismiss="modal"></i>
                    </div>
                    <div class="tabs mt-3">
                        <div class="row">
                            <center>
                                <h4 style="color:#7c0cfc;">Update Room Details</h4>
                            </center>
                        </div>
                        <hr>
                        <form id="edit-room" class="p-3">
                            <input type="number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 5);" value="" name="room_id" id="room-id" style="display:none;">
                            <div class="form-group mt-2">
                                <label for="price">Price</label>
                                <input type="number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 5);" class="form-control" id="price" name="price" placeholder="$" value="">
                            </div>
                            <div class="form-group mt-2">
                                <label for="member">Member</label>
                                <input type="number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2);" class="form-control" name="member" id="member" placeholder="No. of Persons Allowed" value="">
                            </div>
                            <div class="form-group mt-2">
                                <label for="phone">Contact</label>
                                <input type="tel" pattern="[1-9]{1}[0-9]{9}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="">
                            </div>

                            <button type="submit" class="btn btn-success mt-4 ">Update</button>
                        </form>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.edit-room').click(function() {
            var room_id = $(this).data('roomid');
            $('#room-id').val(room_id);
        });
    });
</script>

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
        $(document).on('submit', '#edit-room', function(e) {
            e.preventDefault();
            $('.loader').addClass('is-active');
            $.ajax({
                url: "edit-room.php",
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    $('.loader').removeClass('is-active');

                    if (response == '1') {

                        alert("Error");

                    } else if (response == '2') {

                        alert('Updated successfully...');
                        $('#edit-room')[0].reset();
                        window.location = "myproperties.php";
                    }
                },
                error: function() {
                    $('.loader').removeClass('is-active');
                    alert('An error occurred during the submiting process ');
                }
            });
        });
    </script>
</body>

</html>