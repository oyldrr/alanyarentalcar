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
    <title>Select Location | Alanyarentalcar</title>

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
    <div class="content" data-aos="fade-in">

        <div class="back-btn-container">
            <a href="select-dates.php" class="btn btn-yellow">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>

        <div class="container m-5 p-5">
            <h1 class="text-uppercase text-yellow text-center mb-3">select location</h1>

            <p class="text-center my-5">Please select one of the location options to get the car.</p>

            <div class="location-options">
                <div class="disabled">
                    <img src="assets/images/agency-offices.jpg" alt="">
                    <h5>Agency Offices</h5>
                    <p></p>
                </div>

                <div onclick="toSelectAirport()">
                    <img src="assets/images/airports.jpg" alt="">
                    <h5>Airports</h5>
                    <p></p>
                </div>

                <div class="disabled">
                    <img src="assets/images/location-on-map.jpg" alt="">
                    <h5>Pick a location on map</h5>
                    <p></p>
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