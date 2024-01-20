<?php
include 'connection.php';

session_start();
if (!isset($_SESSION['IS_LOGIN']) && !isset($_SESSION['USER_EMAIL'])) {
    header('location: home.php');
    exit;
}
include "connection.php";
$sel = "SELECT * FROM user ";
$que = mysqli_query($conn, $sel) or die('Error');
mysqli_num_rows($que) > 0; {
    $fetch = mysqli_fetch_assoc($que);
}

$login_row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE u_mail = '$_SESSION[USER_EMAIL]'"));
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
    <link rel="stylesheet" href="CSS/owner-profile.css">
    <link rel="stylesheet" href="CSS/loader.css">
    <title>Document</title>
</head>


<body>
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
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <div class="loader loader-double" style="width: 100%; height: inherit;"></div>
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
                        <h3 id="displayedname" style="<?php echo ($login_row['u_name'] !== null && $login_row['u_name'] !== '') ? '' : 'font-size: inherit; ' ?>">
                            <?php
                            if ($login_row['u_name'] !== null && $login_row['u_name'] !== '') {
                                echo $login_row['u_name'];
                            } else {
                                echo "<span style='font-size: 14px; color: lightgray;'>Update your name</span>";
                            }
                            ?>
                        </h3>
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
            <div class="col-md" id="dashboard">
                <div class=" container py-3 bg-light">

                    <div style="margin-left:34px;" class="main__title">
                        <div class="main__greeting">
                            <p>Manage Your Profile!</p>
                        </div>
                    </div>
                    <div class="container">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <article>
                                        <div class="article-wrapper">
                                            <div class="profile-picture-container">
                                                <figure class="profile-picture">
                                                    <?php
                                                    // Check if there is a profile picture in the database
                                                    if (!empty($login_row['u_photo'])) {
                                                        // Display the profile picture from the database
                                                        echo '<img src="Photos/' . $login_row['u_photo'] . '" alt="Profile Picture" />';
                                                    } else {
                                                        // Display the default profile picture
                                                        echo '<img src="images/user.jpg" alt="Profile Picture" />';
                                                    }
                                                    ?>
                                                </figure>
                                            </div>
                                            <hr>
                                            <div class="article-body">
                                                <div class="article-content">
                                                    <h2 style="text-align:center;">Hello<br> <span id="displayedName"> <?= $login_row['u_name']; ?></span></h2>

                                                    <a href="#" class="read-more">
                                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>

                                </div>
                                <div class="col-md-8">
                                    <div class="profile-content">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md">
                                                        <h4 class="card-title text-center" style="@import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap');font-family: 'Caveat', cursive; letter-spacing:2px; font-size:2rem;">Personal Information</h4>
                                                    </div>


                                                </div>
                                                <form action="" id="form-name">
                                                    <div class="form-group">
                                                        <div class="input-container">
                                                            <input type="text" class="form-field form-control" placeholder="Name" name="name" id="name1" required oninput="allowOnlyAlphabets(event)" value="<?= $login_row['u_name']; ?>" required readonly />
                                                            <button type="submit" class="btn btn-primary" id="saveName" style="display: none;">Save</button>
                                                        </div>
                                                        <div class="label-container">
                                                            <label for="name1" class="form-label">Name</label>
                                                            <a href="javascript:void(0);" onclick="editField('name1', 'saveName')" style="text-decoration:none; font-weight:500; letter-spacing:2px;">Edit</a>
                                                        </div>
                                                    </div>
                                                </form>
                                                <?php $genderUpdated = $login_row['u_gender'] !== null && $login_row['u_gender'] !== '';
                                                ?>
                                                <form action="" id="form-gender">
                                                    <div class="form-group" style="display: flex; align-items: center;">
                                                        <label for="gender" class="form-label" style="color: maroon;">Your Gender</label>
                                                        <div style="display: flex; align-items: center;">
                                                            <select name="gender" id="gender" class="form-field form-control" style="width: 200px; padding: 5px; border: 1px solid #ccc; border-radius: 5px; margin-top: 15px;" required <?= $genderUpdated ? 'disabled' : '' ?>>
                                                                <option value="<?= $fetch['u_gender']; ?>"><?= $login_row['u_gender']; ?></option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                                <option value="others">Others</option>
                                                            </select>
                                                            <?php if (!$genderUpdated) : ?>
                                                                <button type="submit" class="btn btn-primary" id="saveGender" style="width: 60px; margin-top:15px;">Save</button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <?php if (!$genderUpdated) : ?>
                                                        <a id="genderEdit" href="javascript:void(0);" onclick="editField('gender', 'saveGender')" style="text-decoration:none; font-weight:500; letter-spacing:2px;">Edit</a>
                                                    <?php endif; ?>
                                                </form>
                                                <br>
                                                <br>
                                                <form action="" id="form-email">
                                                    <div class="form-group">
                                                        <div class="input-container">
                                                            <input type="email" class="form-field form-control" placeholder="Email" name="email" id="email" value="<?= $login_row['u_mail']; ?>" required readonly />
                                                            <?php
                                                            if (($login_row['u_mail'] == NULL)) {
                                                                echo '<button type="submit" class="btn btn-primary" id="saveEmail" style="display: none;">Save</button>';
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="label-container">
                                                            <label for="email" class="form-label">Email</label>
                                                            <?php
                                                            if (($login_row['u_mail'] == NULL)) {
                                                                echo '<a href="javascript:void(0);" onclick="editField(\'email\', \'saveEmail\')" style="text-decoration:none; font-weight:500; letter-spacing:2px;">Edit</a>';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </form>



                                                <br>
                                                <br>
                                                <form action="" id="form-phone">
                                                    <div class="form-group">
                                                        <div class="input-container">
                                                            <input type="tel" pattern="[1-9]{1}[0-9]{9}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" class="form-field form-control" placeholder="Mobile Number" name="phone" id="phone" value="<?= $login_row['u_phone']; ?>" required readonly />
                                                            <?php
                                                            if (($login_row['u_phone'] == NULL)) {
                                                                echo '<button type="submit" class="btn btn-primary" id="savePhone" style="display: none;">Save</button>';
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="label-container">
                                                            <label for="phone" class="form-label">Mobile Number</label>
                                                            <?php
                                                            if (($login_row['u_phone'] == NULL)) {
                                                                echo '<a id="phoneEdit" href="javascript:void(0);" onclick="editField(\'phone\', \'savePhone\')" style="text-decoration:none; font-weight:500; letter-spacing:2px;">Edit</a>';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </form>
                                                <br>
                                                <br>
                                                <form action="" id="form-profile">
                                                    <div class="form-group">
                                                        <div class="input-container">
                                                            <input type="file" class="form-field form-control mt-3" accept=".png, .jpg, .jpeg" name="profile" id="profile" value="" required disabled />
                                                            <button type="submit" class="btn btn-primary" id="saveProfile" style="display: none;">Save</button>
                                                        </div>
                                                        <div class="label-container">
                                                            <label for="profile" class="form-label">Profile Photo</label>
                                                            <a id="profileEdit" href="javascript:void(0);" onclick="editField('profile', 'saveProfile')" style="text-decoration:none; font-weight:500; letter-spacing:2px;">Edit</a>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
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
        function editField(inputId, saveButtonId) {
            const inputField = document.getElementById(inputId);
            const saveButton = document.getElementById(saveButtonId);

            inputField.removeAttribute('readonly'); // Remove readonly attribute
            inputField.removeAttribute('disabled'); // Remove readonly attribute
            inputField.style.borderBottom = '2px solid wheat'; // Add border for emphasis
            saveButton.style.display = 'inline-block'; // Show the "Save" button
        }
    </script>

    </script>

    <script>
        $(document).on('submit', '#form-name', function(e) {
            e.preventDefault();
            $('.loader').addClass('is-active');
            var name = $('#name1').val();

            $.ajax({
                url: "update-user-name.php",
                type: "post",
                data: {
                    name: name
                },
                success: function(data) {
                    $('.loader').removeClass('is-active');
                    if (data == '1') {
                        alert("Name Update Successfully");

                        // Update the displayed name on the page
                        $('#displayedName').text(name); // Set the updated name in the <span>
                        $('#displayedname').text(name); // Set the updated name in the <span>

                        // Hide the Save button after successful update
                        $('#saveName').css('display', 'none');
                        $('#name1').attr('readonly', 'readonly');
                    } else {
                        alert("Unsuccessfull");
                    }
                }
            });
        });



        $(document).on('submit', '#form-gender', function(e) {
            e.preventDefault();
            $('.loader').addClass('is-active');

            // Get the selected gender from the <select> element
            var gender = $('#gender').val();

            $.ajax({
                url: "update-user-gender.php",
                type: "post",
                data: {
                    gender: gender
                },
                success: function(data) {
                    $('.loader').removeClass('is-active');
                    if (data == '1') {
                        alert("Gender Update Successfully");

                        // Update the displayed gender on the page
                        $('#displayedgender').text(gender); // Set the updated gender in the <span>

                        // Hide the Save button after successful update
                        $('#saveGender').css('display', 'none');
                        $('#genderEdit').css('display', 'none');
                        $('#gender').attr('disabled', 'disabled');
                    } else {
                        alert("Unsuccessfull");
                    }
                }
            });
        });



        $(document).on('submit', '#form-email', function(e) {
            e.preventDefault();
            $('.loader').addClass('is-active');

            // Get the selected gender from the <select> element
            var gender = $('#email').val();

            $.ajax({
                url: "update-user-email.php",
                type: "post",
                data: {
                    email: email
                },
                success: function(data) {
                    $('.loader').removeClass('is-active');
                    if (data == '1') {
                        alert("Email Update Successfully");
                        // Hide the Save button after successful update
                        $('#saveEmail').css('display', 'none');
                        $('#emailEdit').css('display', 'none');
                        $('#email').attr('readonly', 'readonly');
                    } else {
                        alert("Unsuccessfull");
                    }
                }
            });
        });




        $(document).on('submit', '#form-phone', function(e) {
            e.preventDefault();
            $('.loader').addClass('is-active');

            // Get the selected gender from the <select> element
            var phone = $('#phone').val();

            $.ajax({
                url: "update-user-phone.php",
                type: "post",
                data: {
                    phone: phone
                },
                success: function(data) {
                    $('.loader').removeClass('is-active');
                    if (data == '1') {
                        alert("Phone Number Update Successfully");
                        // Hide the Save button after successful update
                        $('#savePhone').css('display', 'none');
                        $('#phoneEdit').css('display', 'none');
                        $('#phone').attr('readonly', 'readonly');
                    } else if (data == '2') {
                        alert("Error updating photo.");
                    } else if (data == '3') {
                        alert("Error preparing statement.");
                    } else if (data == '4') {
                        alert("Error uploading file.");

                    } else if (data == '5') {
                        alert("File upload error.");
                    } else if (data == '6') {
                        alert("Invalid request.");
                    }
                }
            });
        });



        // Profile Photo Update
        $(document).on('submit', '#form-profile', function(e) {
            e.preventDefault();
            $('.loader').addClass('is-active');

            var formData = new FormData();
            formData.append('profile', $('#profile')[0].files[0]);

            $.ajax({
                url: "update-user-profile.php",
                type: "post",
                data: formData,
                processData: false, // Important! Don't process the data
                contentType: false, // Important! Set content type to false
                success: function(data) {
                    $('.loader').removeClass('is-active');
                    if (data == '1') {
                        alert("Profile Photo Update Successfully");
                        // Hide the Save button after successful update
                        $('#saveProfile').css('display', 'none');
                        $('#profileEdit').css('display', 'none');
                        $('#profile').attr('disabled', 'disabled');

                        // Reload the profile photo
                        refreshProfilePhoto();
                    } else {
                        alert("Unsuccessful");
                    }
                }
            });
        });
    </script>


</body>

</html>