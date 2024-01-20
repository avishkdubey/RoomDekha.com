<?php
session_start();
include "connection.php";
$user_email = $_SESSION['USER_EMAIL'];
$sel = "SELECT * FROM user where u_mail = '$user_email' ";
$que = mysqli_query($conn, $sel) or die('Error');
if (mysqli_num_rows($que) > 0) {
    $fetch = mysqli_fetch_assoc($que);
}

$login_row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE u_mail = '$user_email'"));
$query = "SELECT * FROM room";
$result = mysqli_query($conn, $query);

$room_id = $_GET['room_id'];
$email = $_SESSION['USER_EMAIL'];
include 'connection.php';

$query = "SELECT * FROM room WHERE room_id = $room_id ";
$query2 = "SELECT * FROM room, owner WHERE room.owner_id = owner.owner_id";
$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);
$row = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result2);

$query3 = "SELECT user_id FROM user WHERE u_mail = '$email'"; // Enclose email in quotes
$result3 = mysqli_query($conn, $query3);
$row3 = mysqli_fetch_assoc($result3);
$user_id = $row3['user_id']; // Get the user ID

$query5 = mysqli_query($conn, "SELECT * FROM user WHERE u_mail='$email'");
$row5 = mysqli_fetch_assoc($query5);


// $avg= "SELECT ";
// echo "<pre>";
// print_r($row);
// print_r($row5);
// echo "</pre>";
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>QuickView</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="quickview.css">
</head>
<style>
    .thumbnail:hover {
        cursor: pointer;
        border: 2px solid #8000002e;
    }



    #myModal {
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        align-items: center;
    }

    #information {
        background-color: #fefefe;
        margin: auto;
        margin-top: 15%;
        padding: 20px;
        border: 1px solid #888;
        width: 30%;
    }

    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    #close-btn {
        text-align: right;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .heading {
        margin-top: 30px;
        background-color: whitesmoke;
        height: 50px;
        padding: 10px;
    }

    .heading h1 {

        text-align: center;
        font-size: 25px;
        font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;


    }

    * {
        margin: 0;
        padding: 0;
    }

    #list li {
        padding-right: 15px;
        padding-left: 15px;
        margin-top: 8px;
        margin-bottom: 8px;
    }

    #list li a {
        text-decoration: none;
        padding-right: 15px;
        padding-left: 15px;
        margin-top: 10px;
        margin-bottom: 10px;
        border-radius: 20px;
    }

    #list li a:hover {
        background-color: #8000002e;
    }
</style>

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
                    <h3 style="font-size: 22px;"><ion-icon name="home-outline"></ion-icon></ion-icon>&nbsp;RoomDekho.com
                    </h3>
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="list">
                    <li class="nav-item">
                        <a class="nav-link" href="flats.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Support</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">



            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
        <hr>
    </nav>

    <div class="container-fluid bg-light">

        <div id="myModal" class="modal container-fluid">

            <!-- Modal content -->
            <div class="modal-content card" id="information">

                <div id="close-btn" class="row">
                    <span class="close">&times;</span>
                </div>
                <div class="row">
                    <div class="col md-6">
                        <h6 class="text-small" style=" font-size: larger; "><i class="fa fa-brands fa-whatsapp fa-beat-fade fa-lg" style="color: #379e00;"></i><span>&nbsp;&nbsp;Contact Number :</span></h6>
                    </div>
                    <div class="col md-6">
                        <p>+91- <?php echo $row2['o_phone'] ?></p>
                    </div>


                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-1">

                <div class="row mt-5">
                    <div class="col-md-2"></div>
                    <div class="col-md-9 p-2">
                        <div class="card" style="height: 10vh; border: 2px solid black;">
                            <img class="thumbnail" src="<?php echo "Photos/" . $row['r_image1']; ?>" style="height: 100%; width: 100%;" alt="img">
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-2"></div>
                    <div class="col-md-9 p-2">
                        <div class="card" style="height: 10vh; border: 2px solid black;">
                            <img class="thumbnail" src="<?php echo "Photos/" . $row['r_image2']; ?>" style="height: 100%; width: 100%;" alt="img">
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-2"></div>
                    <div class="col-md-9 p-2">
                        <div class="card" style="height: 10vh; border: 2px solid black;">
                            <img class="thumbnail" src="<?php echo "Photos/" . $row['r_image3']; ?>" style="height: 100%; width: 100%;" alt="img">
                        </div>
                    </div>
                </div>

                <div class="row mt-">
                    <div class="col-md-2"></div>
                    <div class="col-md-9 p-2">
                        <div class="card" style="height: 10vh; border: 2px solid black;">
                            <img class="thumbnail" src="<?php echo "Photos/" . $row['r_image4']; ?>" style="height: 100%; width: 100%;" alt="img">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-5 p-1">
                <div class="card mt-5 bg-light" style=" height: 70vh; border-radius: 10px;">
                    <img id="displayedImage" style="height: 100%; width: 100%; border-radius: 10px;" alt="Flat Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <span class="font-monospace" style="font-family: 'Montserrat', sans-serif; font-size: smaller;"><i class="fa fa-solid fa-star fa-fade fa-sm mt-2 p-1" style="color: #ffdd00;"></i>&nbsp;<span id="average_rating">0.0</span>&nbsp;|&nbsp;49 reviews</span>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h3 class="mt-2" style="font-family: 'Montserrat', sans-serif; font-stretch: extra-condensed;"><?php echo $row['room_type'] ?></h3>
                        This Property Belongs To <span class="text-primary font-monospace"> Abhishek Dubey</span><br>
                        <span class="text-muted"><i class="fa fa-duotone fa-location-dot fa-sm" style="--fa-primary-color: #990000; --fa-secondary-color: #990000;"></i> <?php echo $row['r_address'] ?>, <?php echo $row['r_city'] ?> </span>

                    </div>
                    <div class="col-md-6" style=" text-align:right;">
                        <h3><span><i class="fa fa-light fa-indian-rupee-sign fa-sm" style="color: #000000;"></i>&nbsp;<?php echo $row['price'] ?></span></h3>
                        <?php
                        if ($row['user_id'] == $fetch['user_id'] && $row['booking'] == 1) {
                            echo '<button id="myBtn" style="border-radius: 40px;" type="button" class="btn btn-warning btn-lg mt-2"><i class="fa fa-duotone fa-phone fa-xs" style="--fa-primary-color: #000000; --fa-secondary-color: #000000;"></i>&nbsp;&nbsp;Contact
                            Owner</button>';
                        }

                        ?>
                        <form action="" id="book_status">
                            <input type="number" name="userid" style="display: none;" value="<?php echo $row5['user_id']; ?>">
                            <input type="number" name="roomid" style="display: none;" value="<?php echo $room_id; ?>">

                            <?php
                            if ($row['user_id'] == $fetch['user_id'] && $row['booking'] == 1) {
                                echo '<h4 style="color:green;font-family:cursive">Approved by owner!</h4>';
                            } elseif ($row['user_id'] == $fetch['user_id']) {
                                echo '<button id="bookNowButton" style="border-radius: 40px;" type="submit" class="btn btn-warning btn-lg mt-2 disabled"><i class="fa fa-duotone fa-handshake fa-beat-fade fa-xs" style="color: #000000;"></i>&nbsp;&nbsp;Pending</button>';
                            } else {
                                echo '<button id="bookNowButton" style="border-radius: 40px;" type="submit" class="btn btn-warning btn-lg mt-2"><i class="fa fa-duotone fa-handshake fa-beat-fade fa-xs" style="color: #000000;"></i>&nbsp;&nbsp;Book Now</button>';
                            }

                            ?>


                        </form>

                    </div>
                </div>
                <div class="row m-5 mb-4">
                    <div class="col-md-6">
                        <span class="">
                            <h6>House Number</h6>
                            <h6 style="font-weight:normal;"><?php echo $row['house_no'] ?></h6>
                        </span>
                        <br>
                        <span>
                            <h6>Ward Number</h6>
                            <h6 style="font-weight:normal;"><?php echo $row['ward_no'] ?></h6>
                        </span>
                        <br>
                        <span>
                            <h6>State</h6>
                            <h6 style="font-weight:normal;"><?php echo $row['r_state'] ?></h6>
                        </span>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <h6>City</h6>
                            <h6 style="font-weight:normal;"><?php echo $row['r_city'] ?></h6>
                        </span>
                        <br>
                        <span>
                            <h6>Person Allowed</h6>
                            <h6 style="font-weight:normal;"><?php echo $row['r_person'] ?></h6>
                        </span>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="card border-light mb-3" style="max-width: auto;">
                        <div class="card-header font-monospace">About This Property</div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $row['r_description'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="heading">
        <h1>Give your precious feedback for others</h1>
    </div>
    <div class="container" style="margin-top:50px;margin-left:10px;">

        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <h1 class="text-warning mt-4 mb-4">
                            <b><span id="average_rating">0.0</span> / 5</b>
                        </h1>
                        <div class="mb-3">
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                        </div>
                        <h3><span id="total_review">0</span> Review</h3>
                    </div>
                    <div class="col-sm-4">
                        <p>
                        <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                        <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                        </div>
                        </p>
                        <p>
                        <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                        <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                        </div>
                        </p>
                        <p>
                        <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                        <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                        </div>
                        </p>
                        <p>
                        <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                        <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                        </div>
                        </p>
                        <p>
                        <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                        <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                        </div>
                        </p>
                    </div>
                    <div class="col-sm-4 text-center">
                        <h3 class="mt-4 mb-3">Write Review Here</h3>
                        <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5" id="review_content"></div>
    </div>
</body>

</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog" ;>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Submit Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center mt-2 mb-4">
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>
                <div class="form-group">
                    <input style="display: none;" type="text" name="room_id" id="room_id" class="form-control" value="<?= $row['room_id']; ?>" required />
                </div>
                <div class="form-group">
                    <input style="display: none;" type="text" name="user_id" id="user_id" class="form-control" value="<?php echo $row3['user_id'] ?>" required />
                </div>
                <div class="form-group">
                    <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                </div>
                <div class="form-group text-center mt-4">
                    <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .progress-label-left {
        float: left;
        margin-right: 0.5em;
        Line-height: 1em;
    }

    .progress-label-right {
        float: right;
        margin-left: 0.3em;
        Line-height: 1em;
    }

    .star-light {
        color: #e9ecef;
    }
</style>

<script>
    $(document).ready(function() {
        var rating_data = 0;

        $('#add_review').click(function() {
            // Get the room_id dynamically (you can replace this with your logic)
            var room_id = <?= $row['room_id']; ?>; // Replace with your logic to fetch room_id
            $('#room_id').val(room_id); // Set the room_id input field in the modal
            $('#review_modal').modal('show');
        });
        $(document).on('mouseenter', '.submit_star', function() {

            var rating = $(this).data('rating');

            reset_background();

            for (var count = 1; count <= rating; count++)

            {

                $('#submit_star_' + count).addClass('text-warning');

            }

        });

        function reset_background() {
            for (var count = 1; count <= 5; count++) {
                $('#submit_star_' + count).addClass('star-light');

                $('#submit_star_' + count).removeClass('text-warning');

            }
        }

        $(document).on('mouseleave', 'submit_star', function() {
            reset_background();
        });

        $(document).on('click', '.submit_star', function() {
            rating_data = $(this).data('rating');
        });
        $('#save_review').click(function() {
            var user_id = $('#user_id').val();
            var user_review = $('#user_review').val();
            var room_id = $('#room_id').val(); // Get the room_id from the hidden input

            if (user_id == '' || user_review == '') {
                alert("Please Fill Both Fields");
                return false;
            } else {
                $.ajax({
                    url: "submit_rating.php",
                    method: "POST",
                    data: {
                        rating_data: rating_data,
                        user_id: user_id,
                        user_review: user_review,
                        room_id: room_id // Include room_id in the data
                    },
                    success: function(data) {
                        $('#review_modal').modal('hide');
                        load_rating_data();
                        alert(data);
                    }
                });
            }
        });

        load_rating_data();

        function load_rating_data() {
            $.ajax({
                url: "submit_rating.php",
                method: "POST",
                data: {
                    action: 'load_data'
                },
                dataType: "JSON",
                success: function(data) {
                    $('#average_rating').text(data.average_rating);
                    $('#total_review').text(data.total_review);

                    var count_star = 0;

                    $('.main_star').each(function() {
                        count_star++;
                        if (Math.ceil(data.average_rating) >= count_star) {
                            $(this).addClass('text-warning');
                            $(this).addClass('star-light');
                        }
                    });

                    $('#total_five_star_review').text(data.five_star_review);

                    $('#total_four_star_review').text(data.four_star_review);

                    $('#total_three_star_review').text(data.three_star_review);

                    $('#total_two_star_review').text(data.two_star_review);

                    $('#total_one_star_review').text(data.one_star_review);

                    $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

                    $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

                    $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

                    $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

                    $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

                    if (data.review_data.length > 0) {
                        var html = '';

                        for (var count = 0; count < data.review_data.length; count++) {
                            html += '<div class="row mb-3">';

                            html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].user_id.charAt(0) + '</h3></div></div>';

                            html += '<div class="col-sm-11">';

                            html += '<div class="card">';

                            html += '<div class="card-header"><b>' + data.review_data[count].user_id + '</b></div>';

                            html += '<div class="card-body">';

                            for (var star = 1; star <= 5; star++) {
                                var class_name = '';

                                if (data.review_data[count].rating >= star) {
                                    class_name = 'text-warning';
                                } else {
                                    class_name = 'star-light';
                                }

                                html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                            }

                            html += '<br />';

                            html += data.review_data[count].user_review;

                            html += '</div>';

                            html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';

                            html += '</div>';

                            html += '</div>';

                            html += '</div>';
                        }

                        $('#review_content').html(html);
                    }
                }
            })
        }


    });
</script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        var currentImageSrc = '<?php echo "Photos/" . $row['r_image1']; ?>';

        $('#displayedImage').attr('src', currentImageSrc);

        $('.thumbnail').hover(function() {
            var thumbnailSrc = $(this).attr('src');

            if (thumbnailSrc !== currentImageSrc) {
                currentImageSrc = thumbnailSrc;
                $('#displayedImage').attr('src', thumbnailSrc);
            }
        });
    });

    // ________________________

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


<script>
    $(document).on('submit', '#book_status', function(e) {
        e.preventDefault();
        $.ajax({
            url: "update_booking.php",
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {

                if (response == '1') {

                    alert("Request Sent Wait for Approve from Room Owner side...");
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