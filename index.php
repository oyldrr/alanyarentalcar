<?php
session_start();
require_once "config/connection.php";

// Displaying header
include_once "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index | Template</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap Library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Favicon -->
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

</head>

<body class="index">

    <?php

    // Displaying header
    include_once "header.php";
    ?>

    <!-- Content of page goes here -->
    <div class="content">

    </div>

</body>

<?php

// Displaying footer
include_once "footer.php";
?>

<!-- Custom js -->
<script src="js/script.js"></script>

</html>