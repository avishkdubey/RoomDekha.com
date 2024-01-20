<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flats</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="CSS/loader.css">
    <link rel="stylesheet" href="CSS/owner-verify.css?v=<?php echo time() ?>">
</head>

<body>
    <div class="loader loader-double" style="width: 100%; height: inherit;"></div>
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
                    <h3 style="font-size: 22px;"><ion-icon name="home-outline"></ion-icon>&nbsp;RoomDekho.com</h3>
                </a>

                <!-- Support link floated to the right -->
                <ul class="navbar-nav" id="list">
                    <li class="nav-item">
                        <a class="nav-link support-link" href="partner.php"><i class="fa fa-solid fa-angle-left fa-xl" style="color: #000000;"></i>&nbsp;Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3 bg-light">
                <div class="video-container">
                    <video autoplay loop muted playsinline>
                        <source src="images\Brown Minimalist Real Estate Mobile Video.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="col-md-5 bg-light">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md m-5">
                            <h4 class="card-title text-center" style="@import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap');font-family: 'Caveat', cursive; letter-spacing:2px; font-size:1.2rem;">Hello! <span style="color:maroon;">Welcome To RoomDekha.com Family</span></h4>
                        </div>


                    </div>

                    <div class="container m-auto">
                        <form method="post" enctype="multipart/form-data" action="owner-insert.php">
                            <div class="form-group mt-5">
                                <div class="label-container">
                                    <label for="name1" class="form-label">Name</label>
                                </div>
                                <div class="input-container">
                                    <input type="text" class="form-field" placeholder="Name" name="name" id="name1" value="" required />
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <div class="label-container">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                </div>
                                <div class="input-container">
                                    <input type="date" class="form-field" placeholder="DOB" name="dob" id="dob" value="" required />
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <div class="label-container">
                                    <label for="email" class="form-label">Email</label>
                                </div>
                                <div class="input-container">
                                    <input type="email" class="form-field" placeholder="Name" name="email" id="email" value="" required />
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <div class="label-container">
                                    <label for="pass" class="form-label">Password</label>
                                </div>
                                <div class="input-container">
                                    <input type="password" class="form-field" placeholder="Name" name="pass" id="pass" value="" required />
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <div class="label-container">
                                    <label for="phone" class="form-label">Phone Number</label>
                                </div>
                                <div class="input-container">
                                    <input type="tel" pattern="[1-9]{1}[0-9]{9}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" class="form-field" placeholder="Name" name="phone" id="phone" value="" required />
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <div class="label-container">
                                    <label for="add" class="form-label">Address</label>
                                </div>
                                <div class="input-container">
                                    <input type="text" class="form-field" placeholder="Address" name="address" id="add" value="" required />
                                </div>
                            </div>
                            <div class="row" style="float:right;">
                                <input type="submit" value="Submit" name="submit" class="btn btn-lg btn-info" name="add">
                                <!-- <button type="submit" name="add" style="background-color: transparent; border:none;" class="animated-button"><ion-icon style="font-size:5vh; margin-top:20px; color:black;" name="arrow-forward-sharp"></ion-icon></button> -->
                            </div>


                        </form>
                    </div>

                </div>
                <div class="col-md-2"></div>

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- <>
            $(document).on('submit', '#ownerForm1', function(e) {
                e.preventDefault();
                $('.loader').addClass('is-active');
                $.ajax({
                    url: "owner-insert.php",
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log('AJAX request succeeded'); // Add this line
                        $('.loader').removeClass('is-active');

                        if (response == '1') {

                            alert("You Joined us already! Please Login.");

                        } else if (response == '2') {

                            alert('Congratulations🥳 Welcome to RoomDekha.com Family.');
                            $('#ownerForm1')[0].reset();
                            window.location = "payment.php";
                        } else if (response == '3') {
                            alert('You are under 18.');
                        }
                    },
                    error: function() {
                        $('.loader').removeClass('is-active');
                        alert('An error occurred during the submiting process ');
                    }
                });
            });
        </script> -->


</body>

</html>