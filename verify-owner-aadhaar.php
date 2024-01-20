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

    <link rel="stylesheet" href="CSS/verify-owner-aadhaar.css?v=<?php echo time() ?>">
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
                    <h3 style="font-size: 22px;"><ion-icon name="home-outline"></ion-icon>&nbsp;RoomDekho.com</h3>
                </a>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="card bg-light" style="width: 50%;">
            <div class="row text-center">
                <h5 class="mt-5">Aadhaar Verification</h5>
                <div class="card-body">
                    <form action="">
                        <div class="form-group mt-4">
                            <div class="label-container">
                                <label for="name1" class="form-label">Enter aadhaar</label>
                            </div>
                            <div class="input-container">
                                <input type="text" id="adhaarNo" name="adhaarNo" onkeyup="verify()" class="form-field" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12);" required /><br>
                                <bold class="alert-danger" id="message" style="color:red"></bold>
                            </div>
                        </div>
                        <div class="row" style="float:right;">
                            <a href="ow-payment.php" role="button" class="animated-button"><ion-icon style="font-size:5vh; margin-right:20px; margin-top:20px; color:black;" name="arrow-forward-sharp"></ion-icon></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
    <script>
        const d = [
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 0, 6, 7, 8, 9, 5],
            [2, 3, 4, 0, 1, 7, 8, 9, 5, 6],
            [3, 4, 0, 1, 2, 8, 9, 5, 6, 7],
            [4, 0, 1, 2, 3, 9, 5, 6, 7, 8],
            [5, 9, 8, 7, 6, 0, 4, 3, 2, 1],
            [6, 5, 9, 8, 7, 1, 0, 4, 3, 2],
            [7, 6, 5, 9, 8, 2, 1, 0, 4, 3],
            [8, 7, 6, 5, 9, 3, 2, 1, 0, 4],
            [9, 8, 7, 6, 5, 4, 3, 2, 1, 0]
        ]

        const p = [
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 5, 7, 6, 2, 8, 3, 0, 9, 4],
            [5, 8, 0, 3, 7, 9, 6, 1, 4, 2],
            [8, 9, 1, 6, 0, 4, 3, 5, 2, 7],
            [9, 4, 5, 3, 1, 2, 6, 8, 7, 0],
            [4, 2, 8, 6, 5, 7, 3, 9, 0, 1],
            [2, 7, 9, 3, 8, 0, 6, 4, 1, 5],
            [7, 0, 4, 6, 9, 1, 3, 2, 5, 8]
        ]

        function validate(addharNumber) {
            let c = 0;
            let invertedArray = addharNumber.split("").map(Number).reverse();

            invertedArray.forEach((val, i) => {
                c = d[c][p[(i % 8)][val]]
            });

            return (c === 0)
        }

        function verify() {
            let message = document.getElementById('message');
            const adhaarNo = document.getElementById('adhaarNo').value;
            if (adhaarNo.length == '12') {
                if (validate(adhaarNo)) {
                    message.innerHTML = 'Valid';
                    $('input[name="aadhaar_valid"]').value = "valid";
                    $('input[name="aadhaar_valid"]').val("valid");

                } else {
                    message.innerHTML = 'InValid';
                    $('input[name="aadhaar_valid"]').val("invalid");
                }
            } else {
                message.innerHTML = 'InValid';
                $('input[name="aadhaar_valid"]').val("invalid");
            }
        }
    </script>
</body>

</html>