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
    <title>Rent a Car | Alanyarentalcar</title>

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
    <div class="content py-5 my-5">
        <div class="buttons-container d-flex justify-content-between w-75">
            <div class="left-buttons">
                <select class="form-control" name="page-number" id="page-number">
                    <option value="1">1</option>
                </select>
            </div>
            <div class="right-buttons d-flex justify-content-between w-25">
                <select class="form-control me-5" name="filter" id="filter">
                    <option value="">Filter</option>
                </select>

                <select class="form-control" name="order" id="order">
                    <option value="">Order</option>
                </select>
            </div>
        </div>

        <div class="cars-container w-75 m-5">
            <?php
            // Getting all the cars which is active and ordering by newest to oldest
            $stmt = $conn->prepare('SELECT * FROM cars WHERE active = 1 ORDER BY created_At DESC');
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) :
            ?>
                <div class="car-card border mb-3 p-3 rounded d-flex" data-aos="fade-up" data-aos-delay="100">

                    <div class="card-col w-50 me-3">
                        <div class="car-image w-100">
                            <img width="100%" class="rounded" src="assets/images/cars/<?= $row['image'] ?>" alt="">
                        </div>
                        <h5 class="text-uppercase pt-3"><?= $row['model'] ?></h5>
                        <p>or similar</p>
                    </div>

                    <div class="card-col w-25">
                        <div class="gear mt-2 mb-4">
                            <i class="fas fa-gear"></i>
                            <span><?= $row['gear'] ?></span>
                        </div>

                        <div class="fuel mb-4">
                            <i class="fas fa-gas-pump"></i>
                            <span><?= $row['fuel'] ?></span>
                        </div>

                        <div class="class">
                            <i class="fas fa-car"></i>
                            <span><?= $row['class'] ?></span>
                        </div>
                    </div>

                    <div class="card-col w-100 text-center">
                        <p class="deposit mb-4 py-1">
                            <i class="fas fa-money-bill"></i>
                            <b>Deposit:</b>
                            <span id="deposit-price">10</span>
                            <span id="cuurency">$</span>
                        </p>

                        <p class="total-distance mb-4">
                            <i class="fas fa-road"></i>
                            <b>Total mileage limit:</b>
                            <span id="distance-value">1000</span>
                            <span id="unit">km</span>
                        </p>

                        <p class="pickup-location">
                            <i class="fas fa-location"></i>
                            <b>Pickup location:</b>
                            <span id="pickup-location">Airport</span>
                        </p>


                        <div class="d-flex justify-content-end mt-4 me-5">
                            <span class="h1">100</span>
                            .00
                            <span class="currency">$</span>
                        </div>
                    </div>

                    <div class="card-col w-50 text-right">
                        <img class="agency-img" src="assets/images/agencies/aymon.png" alt="agency-img">
                        <p>
                            <!-- Display stars agency points -->
                            <?php 
                                if ($row['stars'] == 1) {
                                    echo "<i class='fa fa-star text-yellow'></i>";
                                }
                                elseif ($row['stars'] == 2) {
                                    echo "<i class='fa fa-star text-yellow'></i>";
                                    echo "<i class='fa fa-star text-yellow'></i>";
                                }
                                elseif ($row['stars'] == 3) {
                                    echo "<i class='fa fa-star text-yellow'></i>";
                                    echo "<i class='fa fa-star text-yellow'></i>";
                                    echo "<i class='fa fa-star text-yellow'></i>";
                                }
                                elseif ($row['stars'] == 4) {
                                    echo "<i class='fa fa-star text-yellow'></i>";
                                    echo "<i class='fa fa-star text-yellow'></i>";
                                    echo "<i class='fa fa-star text-yellow'></i>";
                                    echo "<i class='fa fa-star text-yellow'></i>";
                                }
                                elseif ($row['stars'] == 5) {
                                    echo "<i class='fa fa-star text-yellow'></i>";
                                    echo "<i class='fa fa-star text-yellow'></i>";
                                    echo "<i class='fa fa-star text-yellow'></i>";
                                    echo "<i class='fa fa-star text-yellow'></i>";
                                    echo "<i class='fa fa-star text-yellow'></i>";
                                }
                                ?>
                        </p>

                        <a class="text-dark" href="agency-comments.php"><i>comments</i></a>

                        <a class="btn btn-yellow mt-5 w-100" href="details.php?id=<?= $row['id'] ?>">Select</a>
                    </div>

                </div>

            <?php
            endwhile;
            ?>

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