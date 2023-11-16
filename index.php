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
    <title>Home | Alanyarentalcar</title>

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

    <div class="background-container"></div>

    <div class="header-container">
        <?php
        // Displaying header
        include_once "header.php";
        ?>
    </div>
    <!-- Content of page -->
    <div class="content">
        <a class="rent-btn btn btn-secondary mb-5" href="rent.php">
            Rent a car!
            <p>
                (Please click to rent.)
            </p>
        </a>

        <section id="insurance" class="mt-5">
            <h3 class="text-capitalize">insurance</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat animi ex, enim amet debitis provident quo quidem! Sint culpa dolorum aliquid perferendis, id adipisci a suscipit temporibus tempore obcaecati rem.</p>
        </section>
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