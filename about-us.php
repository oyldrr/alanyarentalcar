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
    <title>About Us | Alanyarentalcar</title>

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
    <div class="content">
        <h3><i class="fas fa-info-circle"></i> About Us</h3>

        <p>alanyarentalcar.com is a car rental website operating in Alanya. It collaborates with "Aymon Rent A Car, Transportation, Real Estate, Tourism and Trade Limited Company" and "Kerim Najdawi Car Rental, Automotive, Real Estate Limited Company." Our company, which started its services in 2018, aims to provide easy and fast car rental services to a larger audience through its website from 2024 onwards. Currently, we only offer car delivery services in Alanya, Antalya, Gazipaşa, Manavgat, and Belek.</p>

        <p>For detailed information and inquiries:</p>

        <p><strong>+905380350762</strong></p>

        <p><a href="mailto:alanyarentalcar@gmail.com">alanyarentalcar@gmail.com</a></p>

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