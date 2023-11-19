<?php
ob_start();

// Initialize the session
session_start();
require_once "config/connection.php";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $reservation_number = $_POST["reservation_number"];

    // Prepare a select statement
    $sql = "SELECT * FROM reservations WHERE reservation_number = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_reservation_number);

        // Set parameters
        $param_reservation_number = $reservation_number;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Store result
            mysqli_stmt_store_result($stmt);

            // Check if username exists, if yes then verify password
            if (mysqli_stmt_num_rows($stmt) == 1) {
                // Bind result variables
                mysqli_stmt_bind_result($stmt, $reservation_number);
                header("location:find-reservation.php?reservation-found");
            } else {
                // Username doesn't exist, display a generic error message
                header("location:find-reservation.php?reservation-couldnt-find");
            }
        } else {
            echo "Oops! Something went wrong! Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}

// Close connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Reservation | Alanyarentalcar</title>

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
        <h1 class="text-center" data-aos="flip-up">Find Reservation</h1>
        <form action="" method="post">
            <div class="mt-3 form-group">
                <label data-aos="flip-up" data-aos-delay="100" for="reservation_number">Reservation Number:</label>
                <input data-aos="flip-up" data-aos-delay="300" type="text" max="11" class="form-control" name="reservation_number" required>
            </div>
            <div class="mt-3 button-group d-flex justify-content-end">
                <button data-aos="flip-up" data-aos-delay="300" type="submit" class="btn btn-yellow">Search</button>
            </div>
        </form>
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