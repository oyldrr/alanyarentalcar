<?php
ob_start();
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Bootstrap Library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="header">

    <div class="logo-container">
        <img src="assets/images/logo.png" alt="alanyarentalcar-logo">
    </div>

    <div class="navbar-buttons">
        <a class="btn btn-primary" href="login.php">
            <i class="fas fa-user"></i>
            Login
        </a>
        <a class="btn btn-primary" href="signup.php">
            <i class="fas fa-user-plus"></i>
            Signup
        </a>
    </div>
    <div class="openNav-container">
        <!-- Navbar turn on button -->
        <span class="openNav" onclick="openNav()">&#9776;</span>
        <!-- Navbar turn on button -->
    </div>

    <div id="mySidenav" class="sidenav">
        <!-- Navbar turn off button -->
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <!-- Navbar turn off button -->

        <!-- Navbar links -->
        <a href="find-reservation.php"><span>
            <i class="fas fa-magnifying-glass"></i>
            Find reservation
        </span></a>
        <a href="about-us.php"><span>
            <i class="fas fa-info-circle"></i>
            About us
        </span></a>
        <a href="contact-us.php"><span>
            <i class="fas fa-phone"></i>
            Contact us
        </span></a>
        <a href="help-center.php">
            <i class="fas fa-comment"></i>
            <span>Help center</span>
        </a>
        <a href="rental-terms.php"><span>
            <i class="fas fa-file"></i>
            Rental terms
        </span></a>
        <a href="faq.php"><span>
            <i class="fas fa-question-circle"></i>
            FAQ
        </span></a>
        <a href="languages.php"><span>
            <i class="fas fa-language"></i>
            Languages
        </span></a>
        <!-- Navbar links -->
    </div>

</body>

<!-- Custom js -->
<script src="js/script.js"></script>

</html>