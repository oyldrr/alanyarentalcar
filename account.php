<?php
session_start();
require_once "config/connection.php";

// If its not logged in direct to login page
if (isset($_SESSION["loggedin"]) !== true) {
    header('location:login.php');
    exit();
}


// Getting user data from the database based on the email stored in $_SESSION
$email = $_SESSION["email"];
$stmt = $conn->prepare('SELECT * FROM users WHERE email LIKE :email');
$stmt->bind_param(':email', $email, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details | Alanyarentalcar</title>

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
        <h1>Account Details</h1>
        <div class="mt-5 w-50 justify-content-start">
            <h3 class="pt-5">Name: <?= $row['name'] ?> </h3>
            <h3 class="pt-5">Surname: <?= $row['surname'] ?> </h3>
            <h3 class="pt-5">Email address: <?= $row['email'] ?> </h3>
            <h3 class="pt-5">Registration date: <?= $row['created_at']  ?> </h3>
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