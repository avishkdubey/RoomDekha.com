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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="CSS/loader.css">
    <link rel="stylesheet" href="CSS/Owner.css">
    <title>Document</title>
</head>

<body>
    <div class="loader loader-double" style="width: 100%; height: inherit;"></div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-lg-top stiky-offset">
        <div class="container-fluid" id="navbar">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                        <a class="nav-link" href="Owner.html">Home</a>
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
            <img class="nav-link dropdown-toggle" src="images/user.jpg" height="50px" width="50px"
                style="border-radius:50px;border:2px solid #8000002e;cursor:pointer;  margin-right:30px;"
                class="user-pic" onclick="toggleMenu()">
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
                <div href="#submenu1" data-bs-toggle="collapse"
                    class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu" style="transition: 0.5s;">
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"><i
                                        class="fa fa-thin fa-house-user fa-xl">&nbsp;</i>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline"><i
                                        class="fa fa-thin fa-comments fa-xl"></i>&nbsp;Message</span> </a>
                        </li>

                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <h3
                                style="color: #000000; font-size: medium;margin-top:30px;margin-bottom:10px;color:gray;">
                                MANAGE LISTINGS</h3>
                            <li class="w-100">
                                <a href="Addproperty.php" class="nav-link px-0"> <span class="d-none d-sm-inline"><i
                                            class="fa fa-thin fa-tag fa-xl"></i></i>&nbsp;Add new
                                        property</span>
                                </a>
                            </li>
                            <li>
                                <a href="myproperties.php" class="nav-link px-0"> <span class="d-none d-sm-inline"><i
                                            class="fa fa-thin fa-hand fa-xl"></i>&nbsp;My
                                        properties</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"><i
                                            class="fa fa-solid fa-building" style="color: #000000;"></i>&nbsp;Other
                                        properties</span>
                                </a>
                            </li>
                        </ul>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <span class="ms-1 d-none d-sm-inline"><i
                                        class="fa fa-thin fa-envelope fa-xl"></i>&nbsp;Reviews</span></a>
                        </li>
                        <h3 style="color: #000000; font-size: medium;margin-top:30px;margin-bottom:10px;color:gray">
                            MANAGE ACCOUNT</h3>
                        <li class="w-100">
                            <a href="owner-profile.php" class="nav-link px-0"> <span class="d-none d-sm-inline"><i
                                        class="fa fa-thin fa-user fa-xl"></i>&nbsp;My Profile</span>
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

                            <h1>Add New Property
                            </h1>
                            <p>

                            </p><br>
                            <p>We are glad to see you again!</p>
                        </div>
                    </div>
                    <div class="form container" style="display: grid;">
                        <!-- <........................................................................................................................................> -->

                        <form action="" class="row" id="form">
                            <div class="col-md-6 " style="height:125vh; overflow: hidden;">
                                <br>
                                <input type="number" name="o_id" hidden value="<?= $fetch['owner_id']; ?>" required>
                                <div class="row">
                                    <div class="col mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="house-no">House Number</label>
                                            <input type="text" name="housenumber" id="house-no"
                                                class="form-control form-control-lg"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" required />
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="address">Address</label>
                                            <input type="text" name="address" id="address"
                                                class="form-control form-control-lg" required />

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col mb-4">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <select class="form-control mt-2" id="state" name="state" required
                                                style="padding-top:13px ;">
                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <select class="form-control mt-2" id="city" name="city" required
                                                style="padding-top:13px ;">
                                                <option value="Gwalior">Gwalior</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="pincode">Pincode</label>
                                            <input type="text" name="pincode" id="pincode"
                                                class="form-control form-control-lg"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="ward-no">Ward Number</label>
                                            <input type="text" name="ward" id="ward-no"
                                                class="form-control form-control-lg"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="tel">Mobile Number</label>
                                            <input type="tel" id="tel" pattern="[1-9]{1}[0-9]{9}"
                                                title="Please enter exactly 10 digits" maxlength="10" name="mnumber"
                                                value="" class="form-control form-control-lg"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);"
                                                required>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- second-div -->
                            <div class="col-md-6" style="height:125vh; overflow: hidden;">
                                <br>
                                <div class="row">
                                    <div class="col mb-4">
                                        <div class="form-group">
                                            <label for="roomType">Type of Room</label>
                                            <select class="form-control mt-2" style="padding-top:13px ;" id="roomType"
                                                name="roomType" required>
                                                <option value="1RK">1 RK</option>
                                                <option value="1BHK">1 BHK</option>
                                                <option value="2BHK">2 BHK</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="rent">Rent Price</label>
                                            <input type="text" name="rent" id="rent"
                                                class="form-control form-control-lg"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="personAllowed">Number of Persons
                                                Allowed</label>
                                            <input type="text" name="personAllowed" id="personAllowed"
                                                class="form-control form-control-lg"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,2);"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <label class="form-label" for="upload_file">Upload Room's Images</label>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-outline mb-4">
                                            <div class="col-md-6 mb-4">
                                                <div id="preview"></div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <img id="user-pic" class="preview form-control form-control-lg"
                                                        src="Images\home-155128_1920.png" alt=""
                                                        style="border:1px solid grey;margin-left:10px; height: 100px; width: 80px;"><br>
                                                    <input type="file" name="image" accept=".png, .jpg, .jpeg"
                                                        class="form-control-file border file" onchange="previewImage()"
                                                        required style="width: 98px;">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-outline mb-4">
                                            <div class="col-md-6 mb-4">
                                                <div id="preview1"></div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <img id="user-pic" class="preview1 form-control form-control-lg"
                                                        src="Images\home-155128_1920.png" alt=""
                                                        style="border:1px solid grey;margin-left:10px; height: 100px; width: 80px;"><br>
                                                    <input type="file" name="image1" accept=".png, .jpg, .jpeg"
                                                        class="form-control-file border file1"
                                                        onchange="previewImage1()" required style="width: 98px;">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-outline mb-4">
                                            <div class="col-md-6 mb-4">
                                                <div id="preview2"></div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <img id="user-pic" class="preview2 form-control form-control-lg"
                                                        src="Images\home-155128_1920.png" alt=""
                                                        style="border:1px solid grey;margin-left:10px; height: 100px; width: 80px;"><br>
                                                    <input type="file" name="image2" accept=".png, .jpg, .jpeg"
                                                        class="form-control-file border file2"
                                                        onchange="previewImage2()" required style="width: 98px;">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-outline mb-4">
                                            <div class="col-md-6 mb-4">
                                                <div id="preview3"></div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <img id="user-pic" class="preview3 form-control form-control-lg"
                                                        src="Images\home-155128_1920.png" alt=""
                                                        style="border:1px solid grey;margin-left:10px; height: 100px; width: 80px;"><br>
                                                    <input type="file" name="image3" accept=".png, .jpg, .jpeg"
                                                        class="form-control-file border file3"
                                                        onchange="previewImage3()" required style="width: 98px;">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"
                                            style="height: 18vh;"></textarea>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end pt-3 mt-5">
                                    <button type="reset" class="btn btn-light btn-lg">Reset all</button>
                                    <button type="submit" class="btn btn-warning btn-lg ms-2">Submit</button>

                                </div>
                            </div>

                        </form>
                        <!--<........................................................................................................................................> -->

                    </div>
                </div>
            </div>




            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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


                // Photo-preview

                function previewImage() {
                    var file = document.querySelector(".file").files;
                    if (file.length > 0) {
                        var fileReader = new FileReader();

                        fileReader.onload = function (event) {
                            document.querySelector(".preview").setAttribute("src", event.target.result);
                        };

                        fileReader.readAsDataURL(file[0]);
                    }
                }
                function previewImage1() {
                    var file = document.querySelector(".file1").files;
                    if (file.length > 0) {
                        var fileReader = new FileReader();

                        fileReader.onload = function (event) {
                            document.querySelector(".preview1").setAttribute("src", event.target.result);
                        };

                        fileReader.readAsDataURL(file[0]);
                    }
                }

                function previewImage2() {
                    var file = document.querySelector(".file2").files;
                    if (file.length > 0) {
                        var fileReader = new FileReader();

                        fileReader.onload = function (event) {
                            document.querySelector(".preview2").setAttribute("src", event.target.result);
                        };

                        fileReader.readAsDataURL(file[0]);
                    }
                }

                function previewImage3() {
                    var file = document.querySelector(".file3").files;
                    if (file.length > 0) {
                        var fileReader = new FileReader();

                        fileReader.onload = function (event) {
                            document.querySelector(".preview3").setAttribute("src", event.target.result);
                        };

                        fileReader.readAsDataURL(file[0]);
                    }
                }


                // <............................................................................................................................................>


                $(document).on('submit', '#form', function (e) {
                    e.preventDefault();
                    $('.loader').addClass('is-active');
                    $.ajax({
                        url: "insert-properties.php",
                        type: "post",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('.loader').removeClass('is-active');

                            if (response == '1') {

                                alert("Home already exits! ");

                            }
                            else if (response == '2') {

                                alert('Property added sucsessfully');
                                $('#form')[0].reset();
                                $('.preview').attr("src", "images/user.jpg");
                                window.location = "Addproperty.php";
                            } else if (response == '3') {
                                alert('error');
                            }
                        },
                        error: function () {
                            $('.loader').removeClass('is-active');
                            alert('An error occurred during the submiting process ');
                        }
                    });
                });


            </script>

</body>

</html>