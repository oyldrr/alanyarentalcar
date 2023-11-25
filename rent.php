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
    <title>Rent a Car | Alanyarentalcar</title>

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
    <div class="content py-5 my-5">
        <div class="buttons-container d-flex justify-content-between w-75">
            <div class="left-buttons">
                <select class="form-control" name="page-number" id="page-number">
                    <option value="1">1</option>
                </select>
            </div>
            <div class="right-buttons d-flex justify-content-between w-25">
                <select class="form-control me-5" name="filter" id="filter">
                    <option value="">Filter</option>
                </select>

                <select class="form-control" name="order" id="order">
                    <option value="">Order</option>
                </select>
            </div>
        </div>

        <div class="cars-container w-75 m-5">
            <div class="car-card border p-3 rounded d-flex">

                <div class="card-col w-25 me-3">
                    <div class="car-image w-100">
                        <img width="100%" class="rounded" src="assets/images/cars/placeholder.jpg" alt="">
                    </div>
                    <h5 class="text-uppercase pt-3">car model</h5>
                    <p>or similar</p>
                </div>

                <div class="card-col w-25">
                    <div class="gear mt-2 mb-4">
                        <i class="fas fa-gear"></i>
                        <span>Gear</span>
                    </div>

                    <div class="fuel mb-4">
                        <i class="fas fa-gas-pump"></i>
                        <span>Fuel</span>
                    </div>

                    <div class="class">
                        <i class="fas fa-car"></i>
                        <span>Class</span>
                    </div>
                </div>

                <div class="card-col">
                    <p class="deposit">
                        <b>Deposit:</b>
                        <span id="deposit-price">10</span>
                        <span id="cuurency">$</span>
                    </p>

                    <p class="total-distance">
                        <b>Total mileage limit:</b>
                        <span id="distance-value">1000</span>
                        <span id="unit">km</span>
                    </p>

                    <p class="pickup-location">
                        <b>Pickup location:</b>
                        <span id="pickup-location">Airport</span>
                    </p>
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