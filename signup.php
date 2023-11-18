<?php
ob_start();

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) === true) {
    header('location:index.php');
    exit();
}

// Include config file
require_once "config/connection.php";

// signup | insertion

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['signup-email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['signup-password']);
    $name = mysqli_real_escape_string($conn, $_POST['signup-name']);
    $surname = mysqli_real_escape_string($conn, $_POST['signup-surname']);

    // Prepare a select statement
    $sql = "SELECT email FROM users WHERE email = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_email);

        // Set parameters
        $param_email = $email;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Store result
            mysqli_stmt_store_result($stmt);

            // Check if username exists, if yes then verify password
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_close($stmt);
                header('location:login.php?username-already-exists');
                exit();
            } else {
                mysqli_stmt_close($stmt);
                $insert = "INSERT INTO `users` (`email`, `pwd`, `name`, `surname`) VALUES (?, ?, ?, ?)";

                if ($stmt = mysqli_prepare($conn, $insert)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "ssss", $param_email, $param_password, $param_name, $param_surname);

                    // Set parameters
                    $param_email = $email;
                    $param_password = password_hash($pwd, PASSWORD_DEFAULT); // Creates a password hash
                    $param_name = $name;
                    $param_surname = $surname;

                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($stmt)) {
                        // Redirect to login page
                        header('location: verification.php?registration=successfull');
                        exit();
                    } else {
                        header('location: signup.php?error');
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                } else {
                    header('location: signup.php?mysqliproblem');
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | Alanyarentalcar</title>

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
                    <h1  data-aos="fade-in" data-aos-delay="100" class="text-center">Signup</h1>
                    <div data-aos="flip-up" class="card">
                        <div class="card-body">
                            <form action="signup.php" method="post">
                                <div class="form-row">
                                    <div class="form-group d-flex justify-content-between">
                                        <div class="col-5">
                                            <label data-aos="flip-up" data-aos-delay="100" for="name">Name:</label>
                                            <input data-aos="flip-up" data-aos-delay="300" type="text" class="form-control" id="name" name="signup-name" required>
                                        </div>
                                        <div class="col-6">
                                            <label data-aos="flip-up" data-aos-delay="100" for="surname">Surname:</label>
                                            <input data-aos="flip-up" data-aos-delay="300" type="text" class="form-control" id="surname" name="signup-surname" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 form-group">
                                    <label data-aos="flip-up" data-aos-delay="100" for="email">Email:</label>
                                    <input data-aos="flip-up" data-aos-delay="300" type="email" class="form-control" id="email" name="signup-email" required>
                                </div>
                                <div class="mt-3 form-group">
                                    <label data-aos="flip-up" data-aos-delay="100" for="password">Password:</label>
                                    <input data-aos="flip-up" data-aos-delay="300" type="password" class="form-control" id="password" name="signup-password" required>
                                </div>
                                <div class="mt-3 form-group form-check">
                                    <input data-aos="flip-up" data-aos-delay="300" type="checkbox" class="form-check-input" id="terms" required>
                                    <label data-aos="zoom-up" data-aos-delay="500" class="form-check-label" for="terms">I agree to the <a href="">terms</a> and <a href="">conditions</a></label>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button data-aos="flip-up" data-aos-delay="600" type="submit" class="btn btn-yellow">Signup</button>
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