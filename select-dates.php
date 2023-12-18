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
    <title>Pickup Date | Alanyarentalcar</title>

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
            <a href="extras.php" class="btn btn-yellow">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>

        <div id="pick-up" class="car-detail-container m-5">
            <h1 class="text-uppercase text-yellow text-center mb-3">pick-up date</h1>

            <p class="text-center my-5">Please enter the date you want to pick up the car.</p>

            <div class="calendar-container w-50 mx-auto mb-5">
                <div class="calendar bg-light rounded p-3">
                    <div class="calendar-header d-flex justify-content-between align-items-center">
                        <div class="btn btn-yellow left-indicator"><i class="fas fa-caret-left"></i></div>
                        <div class="d-flex">
                            <h3 class="calendar-month me-3">December</h3>
                            <h3 class="calendar-year">2023</h3>
                        </div>
                        <div class="btn btn-yellow right-indicator"><i class="fas fa-caret-right"></i></div>
                    </div>

                    <hr>

                    <div class="day-labels">
                        <ul class="d-flex justify-content-between list-type-none px-1">
                            <li>SUN</li>
                            <li>MON</li>
                            <li>TUE</li>
                            <li>WED</li>
                            <li>THU</li>
                            <li>FRI</li>
                            <li>SAT</li>
                        </ul>
                    </div>

                    <div class="days-container">
                        <ul class="list-type-none px-1">
                            <div class="d-flex justify-content-between text-right">
                                <li class="day-box-disabled">27</li>
                                <li class="day-box-disabled">28</li>
                                <li class="day-box-disabled">29</li>
                                <li class="day-box-disabled">30</li>
                                <li class="day-box" onclick="displayDropOff(this)">1</li>
                                <li class="day-box" onclick="displayDropOff(this)">2</li>
                                <li class="day-box" onclick="displayDropOff(this)">3</li>
                            </div>
                            <div class="d-flex justify-content-between text-right">
                                <li class="day-box" onclick="displayDropOff(this)">4</li>
                                <li class="day-box" onclick="displayDropOff(this)">5</li>
                                <li class="day-box" onclick="displayDropOff(this)">6</li>
                                <li class="day-box" onclick="displayDropOff(this)">7</li>
                                <li class="day-box" onclick="displayDropOff(this)">8</li>
                                <li class="day-box" onclick="displayDropOff(this)">9</li>
                                <li class="day-box" onclick="displayDropOff(this)">10</li>
                            </div>
                            <div class="d-flex justify-content-between text-right">
                                <li class="day-box" onclick="displayDropOff(this)">11</li>
                                <li class="day-box" onclick="displayDropOff(this)">12</li>
                                <li class="day-box" onclick="displayDropOff(this)">13</li>
                                <li class="day-box" onclick="displayDropOff(this)">14</li>
                                <li class="day-box" onclick="displayDropOff(this)">15</li>
                                <li class="day-box" onclick="displayDropOff(this)">16</li>
                                <li class="day-box" onclick="displayDropOff(this)">17</li>
                            </div>
                            <div class="d-flex justify-content-between text-right">
                                <li class="day-box" onclick="displayDropOff(this)">18</li>
                                <li class="day-box" onclick="displayDropOff(this)">19</li>
                                <li class="day-box" onclick="displayDropOff(this)">20</li>
                                <li class="day-box" onclick="displayDropOff(this)">21</li>
                                <li class="day-box" onclick="displayDropOff(this)">22</li>
                                <li class="day-box" onclick="displayDropOff(this)">23</li>
                                <li class="day-box" onclick="displayDropOff(this)">24</li>
                            </div>
                            <div class="d-flex justify-content-between text-right">
                                <li class="day-box" onclick="displayDropOff(this)">25</li>
                                <li class="day-box" onclick="displayDropOff(this)">26</li>
                                <li class="day-box" onclick="displayDropOff(this)">27</li>
                                <li class="day-box" onclick="displayDropOff(this)">28</li>
                                <li class="day-box" onclick="displayDropOff(this)">29</li>
                                <li class="day-box" onclick="displayDropOff(this)">30</li>
                                <li class="day-box" onclick="displayDropOff(this)">31</li>
                            </div>
                        </ul>

                    </div>

                </div>
            </div>

            <div class="detail-agency-card mt-5">
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

        <div id="drop-off" class="car-detail-container m-5">
            <h1 class="text-uppercase text-yellow text-center mb-3">drop-off date</h1>

            <p class="text-center my-5">Please enter the date you want to drop-off the car.</p>

            <div class="calendar-container w-50 mx-auto mb-5">
                <div class="calendar bg-light rounded p-3">
                    <div class="calendar-header d-flex justify-content-between align-items-center">
                        <div class="btn btn-yellow left-indicator"><i class="fas fa-caret-left"></i></div>
                        <div class="d-flex">
                            <h3 class="calendar-month me-3">December</h3>
                            <h3 class="calendar-year">2023</h3>
                        </div>
                        <div class="btn btn-yellow right-indicator"><i class="fas fa-caret-right"></i></div>
                    </div>

                    <hr>

                    <div class="day-labels">
                        <ul class="d-flex justify-content-between list-type-none px-1">
                            <li>SUN</li>
                            <li>MON</li>
                            <li>TUE</li>
                            <li>WED</li>
                            <li>THU</li>
                            <li>FRI</li>
                            <li>SAT</li>
                        </ul>
                    </div>

                    <div class="days-container">
                        <ul class="list-type-none px-1">
                            <div class="d-flex justify-content-between text-right">
                                <li class="day-box-disabled">27</li>
                                <li class="day-box-disabled">28</li>
                                <li class="day-box-disabled">29</li>
                                <li class="day-box-disabled">30</li>
                                <li class="day-box" onclick="moveToLocation(this)">1</li>
                                <li class="day-box" onclick="moveToLocation(this)">2</li>
                                <li class="day-box" onclick="moveToLocation(this)">3</li>
                            </div>
                            <div class="d-flex justify-content-between text-right">
                                <li class="day-box" onclick="moveToLocation(this)">4</li>
                                <li class="day-box" onclick="moveToLocation(this)">5</li>
                                <li class="day-box" onclick="moveToLocation(this)">6</li>
                                <li class="day-box" onclick="moveToLocation(this)">7</li>
                                <li class="day-box" onclick="moveToLocation(this)">8</li>
                                <li class="day-box" onclick="moveToLocation(this)">9</li>
                                <li class="day-box" onclick="moveToLocation(this)">10</li>
                            </div>
                            <div class="d-flex justify-content-between text-right">
                                <li class="day-box" onclick="moveToLocation(this)">11</li>
                                <li class="day-box" onclick="moveToLocation(this)">12</li>
                                <li class="day-box" onclick="moveToLocation(this)">13</li>
                                <li class="day-box" onclick="moveToLocation(this)">14</li>
                                <li class="day-box" onclick="moveToLocation(this)">15</li>
                                <li class="day-box" onclick="moveToLocation(this)">16</li>
                                <li class="day-box" onclick="moveToLocation(this)">17</li>
                            </div>
                            <div class="d-flex justify-content-between text-right">
                                <li class="day-box" onclick="moveToLocation(this)">18</li>
                                <li class="day-box" onclick="moveToLocation(this)">19</li>
                                <li class="day-box" onclick="moveToLocation(this)">20</li>
                                <li class="day-box" onclick="moveToLocation(this)">21</li>
                                <li class="day-box" onclick="moveToLocation(this)">22</li>
                                <li class="day-box" onclick="moveToLocation(this)">23</li>
                                <li class="day-box" onclick="moveToLocation(this)">24</li>
                            </div>
                            <div class="d-flex justify-content-between text-right">
                                <li class="day-box" onclick="moveToLocation(this)">25</li>
                                <li class="day-box" onclick="moveToLocation(this)">26</li>
                                <li class="day-box" onclick="moveToLocation(this)">27</li>
                                <li class="day-box" onclick="moveToLocation(this)">28</li>
                                <li class="day-box" onclick="moveToLocation(this)">29</li>
                                <li class="day-box" onclick="moveToLocation(this)">30</li>
                                <li class="day-box" onclick="moveToLocation(this)">31</li>
                            </div>
                        </ul>

                    </div>

                </div>
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