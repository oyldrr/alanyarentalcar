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
    <title>Login | Alanyarentalcar</title>

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
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                <h1 class="text-center">Login</h1>
                    <div class="card">
                        <div class="card-body">
                            <form action="login.php" method="post">
                                <div class="mt-3 form-group">
                                    <label for="username">E-mail:</label>
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mt-3 form-group">
                                    <label for="password">Password:</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        <div>
                                            <a class="input-group-text h-100 text-decoration-none" onclick="togglePasswordVisibility()">
                                                <i id="togglePassword" class="fas fa-eye"></i> 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 button-group d-flex justify-content-between">
                                    <a href="forgot_password.php" class="btn btn-primary">Forgot Password?</a>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
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