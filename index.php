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
    <title>Home | Alanyarentalcar</title>

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

    <div class="background-container"></div>

    <div class="header-container">
        <?php
        // Displaying header
        include_once "header.php";
        ?>
    </div>
    <!-- Content of page -->
    <div class="mt-5 content">
        <a class="mt-5 rent-btn btn btn-secondary mb-5" href="rent.php">
            Rent a car!
            <p>
                (Please click to rent.)
            </p>
        </a>

        <section id="insurance" class="mt-5">
            <div class="d-flex">
                <div class="me-5">
                    <h3 class="text-capitalize">Insurance and Collision Damage Waiver (CDW)</h3>
                    <p>All of our cars are equipped with mandatory traffic insurance.
                        However, cars rented solely with "mandatory traffic insurance"
                        cover the expenses of <strong>Material Damage, Health Expenses,
                            Death, and Disability</strong> within the limits set by the
                        insurance company. <span class="text-danger">This insurance does not provide full coverage
                            to the renters</span> and may lead to the lessee bearing high expenses
                        in the event of an accident.</p>

                    <p>All of our cars are covered by the Collision Damage Waiver (CDW) provided
                        by Atlas Mutuel Insurance. The CDW service is an additional service,
                        comes with a specific fee, and is valid when purchased. In accidents
                        where the use of substances that impair vehicle control, such as alcohol
                        and drugs, is detected, the CDW is not valid, and all expenses and responsibilities
                        belong to the lessee. Our CDW has a 2% deductible; in the event of an accident,
                        the lessee is responsible for paying expenses up to 2%, <span class="text-success">and all other expenses
                            beyond that are covered by the insurance company.</span></p>

                    <p>For more information, please contact us: <strong>+905380350762</strong></p>
                </div>
            </div>
        </section>
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