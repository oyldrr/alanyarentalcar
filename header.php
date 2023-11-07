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
</head>

<body class="header">
    <!-- Desktop Navbar -->
    <div class="desktop">

        <span class="openNav" onclick="openNav()">&#9776;</span>
        <div id="mySidenav" class="sidenav">

            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <a href=""><span>Link</span></a>
        </div>
    </div>
    <!-- End -->

    <!-- Mobile Navbar -->
    <div class="mobile">

    </div>

</body>

<!-- Custom js -->
<script src="js/header.js"></script>

</html>