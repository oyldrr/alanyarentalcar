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
    <title>Extras | Alanyarentalcar</title>

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
    <div class="content py-5 my-5" data-aos="fade-in">

        <div class="back-btn-container">
            <a href="details.php" class="btn btn-yellow">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>

        <div class="car-detail-container m-5">
            <h1 class="text-uppercase text-yellow text-center mb-3">extras</h1>

            <p class="text-center mb-5">Please select the extras you want.</p>

            <form class="w-50 mx-auto">
                <label class="checkbox-container">
                    <p class="d-flex flex-column">
                        Unlimited Kilometers - 20$
                        <span class="checkbox-desc">
                            > Enjoy the freedom to explore without worrying about mileage limits during your rental.
                        </span>
                    </p>
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>

                <label class="checkbox-container">
                    <p class="d-flex flex-column">
                        Infant Car Seat - 5$
                        <span class="checkbox-desc">
                            > Ensure the safety of your little one with a comfortable and secure infant car seat.
                        </span>
                    </p>
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>

                <label class="checkbox-container">
                    <p class="d-flex flex-column">
                        Under 25 Surcharge - 15$
                        <span class="checkbox-desc">
                            > An additional fee for renters under 25 years old, reflecting potential higher risk associated with younger drivers.
                        </span>
                    </p>
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>

                <label class="checkbox-container">
                    <p class="d-flex flex-column">
                        Additional Drivers - 7$
                        <span class="checkbox-desc">
                            > Share the driving responsibilities by adding extra drivers to the rental agreement.
                        </span>
                    </p>
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </form>

            <div class="next-btn-container">
                <a href="select-dates.php" class="btn btn-yellow">Next</a>
            </div>

            <div class="detail-agency-card">
                <h3 class="text-capitalize text-yellow text-center pt-4">agency informations</h3>
                <div class="card-col w-100 d-flex align-items-center justify-content-between px-5">

                    <img class="detail-agency-img" src="assets/images/agencies/aymon.png" alt="agency-img">

                    <div>
                        <ul class="d-flex list-type-none">
                            <li class="me-5">
                                <i class="fas fa-phone me-1"></i>+90 538 035 0762
                            <li>
                                <i class="fas fa-envelope me-1"></i>destek@aymon.com
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-location"></i><a class="text-dark ms-1" href="https://maps.app.goo.gl/MTkMzWGaiqckYsq16" target="_blank">See location on map</a>
                        </div>
                    </div>

                    <div class="d-flex">
                        <a class="text-dark me-3" href="agency-comments.php"><i>comments</i></a>
                        <p>
                            <!-- Display stars agency points -->
                            <i class="fa fa-star text-yellow"></i>
                            <i class="fa fa-star text-yellow"></i>
                            <i class="fa fa-star text-yellow"></i>
                            <i class="fa fa-star text-yellow"></i>
                            <i class="fa fa-star text-yellow"></i>
                        </p>
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