<?php
session_start();
require_once "config/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details | Alanyarentalcar</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap Library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

</head>

<body id="index">

    <div class="header-container">
        <?php
        // Displaying header
        include_once "header.php";
        ?>
    </div>
    <!-- Content of page -->
    <div class="content py-5 my-5" data-aos="fade-in">

        <div class="back-btn-container">
            <a href="rent.php" class="btn btn-yellow">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>

        <div class="car-detail-container m-5">
            <h1 class="text-uppercase text-yellow text-center mb-3">details</h1>
            <div class="car-detail-card mb-3 p-3 rounded d-flex">
                <div class="card-col w-100 me-3">
                    <div class="car-detail-image w-100">
                        <img width="100%" class="rounded" src="assets/images/cars/placeholder.jpg" alt="">
                    </div>
                    <h5 class="text-uppercase pt-3">car model</h5>
                    <p>or similar</p>
                </div>

                <div class="card-col w-100 text-center">
                    <h3 class="text-capitalize text-center mb-5">car specs</h3>
                    <div class="d-flex justify-content-between w-50 mx-auto mb-5 pb-5">
                        <div class="gear">
                            <i class="fas fa-gear"></i>
                            <span>Gear</span>
                        </div>

                        <div class="fuel">
                            <i class="fas fa-gas-pump"></i>
                            <span>Fuel</span>
                        </div>

                        <div class="class">
                            <i class="fas fa-car"></i>
                            <span>Class</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between w-50 mx-auto mb-5">
                        <div class="year">
                            <i class="fas fa-calendar"></i>
                            <span>Year</span>
                        </div>

                        <div class="km">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Km</span>
                        </div>

                        <div class="color">
                            <i class="fa-solid fa-paint-roller"></i>
                            <span>Color</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-col w-100 text-center">
                <h3 class="text-capitalize text-center mb-5">rental terms</h3>
                <div class="d-flex justify-content-between">
                    <div class="box">
                        <h5>Deposit</h5>
                        <h5>10$</h5>
                    </div>
                </div>
            </div>


            <div class="next-btn-container">
                <a href="extras.php" class="btn btn-yellow">Next</a>
            </div>

            <div class="detail-agency-card">
                <h3 class="text-capitalize text-yellow text-center pt-4">agency informations</h3>
                <div class="card-col w-100 d-flex align-items-center justify-content-between px-5">
                    <p>
                        <!-- Display stars agency points -->
                        <i class="fa fa-star text-yellow"></i>
                        <i class="fa fa-star text-yellow"></i>
                        <i class="fa fa-star text-yellow"></i>
                        <i class="fa fa-star text-yellow"></i>
                        <i class="fa fa-star text-yellow"></i>
                    </p>


                    <img class="detail-agency-img" src="assets/images/agencies/aymon.png" alt="agency-img">

                    <a class="text-dark" href="agency-comments.php"><i>comments</i></a>
                </div>
            </div>



        </div>
    </div>

</body>

<div class="footer-container">
    <?php
    // Displaying footer
    include_once "footer.php";
    ?>
</div>


<!-- Custom js -->
<script src="js/script.js"></script>

</html>