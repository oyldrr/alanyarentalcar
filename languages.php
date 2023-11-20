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
    <title>Languages | Alanyarentalcar</title>

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

        <h1 class="mt-3 pt-5 text-center" data-aos="fade-up">Languages</h1>

        <div class="language-box-container">

            <div class="language-box" data-aos="fade-up" data-aos-delay="100">
                <a href="index.php?lang=tr">
                    <img src="assets/images/languages/Flag_of_Turkey.svg.png" alt="turkce">
                    <h3>Türkçe</h3>
                </a>
            </div>

            <div class="language-box" data-aos="fade-up" data-aos-delay="200">
                <a href="index.php?lang=en">
                    <img src="assets/images/languages/uk.png" alt="english">
                    <h3>English</h3>
                </a>
            </div>

            <div class="language-box" data-aos="fade-up" data-aos-delay="300">
                <a href="index.php?lang=ru">
                    <img src="assets/images/languages/ru.png" alt="РУССКИЙ">
                    <h3>РУССКИЙ</h3>
                </a>
            </div>

            <div class="language-box" data-aos="fade-up" data-aos-delay="400">
                <a href="index.php?lang=uk">
                    <img src="assets/images/languages/Flag_of_Ukraine.svg.png" alt="УКРАЇНСЬКА">
                    <h3>УКРАЇНСЬКА</h3>
                </a>
            </div>

            <div class="language-box" data-aos="fade-up" data-aos-delay="500">
                <a href="index.php?lang=de">
                    <img src="assets/images/languages/deutch.jpg" alt="deutch">
                    <h3>Deutch</h3>
                </a>
            </div>

            <div class="language-box" data-aos="fade-up" data-aos-delay="600">
                <a href="index.php?lang=nl">
                    <img src="assets/images/languages/netherlands-flag-medium.jpg" alt="Nederland">
                    <h3>Nederland</h3>
                </a>
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