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
    <title>Select Airport | Alanyarentalcar</title>

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

        <div class="back-btn-container py-5">
            <a href="select-dates.php" class="btn btn-yellow">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>

        <div class="container">
            <h1 class="text-uppercase text-yellow text-center mb-5">select airport</h1>

            <h3 class="text-center">Antalya (AYT)</h3>
            <div class="terminals">
                <ul class="list-type-none">
                    <li onclick="toPayment()">Terminal - 1</li>
                    <li onclick="toPayment()">Terminal - 2</li>
                </ul>
            </div>

            <h3 class="text-center">Gazipasa (GZP)</h3>
            <div class="terminals">
                <ul class="list-type-none">
                    <li onclick="toPayment()">Terminal - 1</li>
                </ul>
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