<?php
ob_start();
require_once "config/connection.php";

session_start();


// If its not logged in direct to login page
if (isset($_SESSION["adminLoggedin"]) !== true) {
    header('location:login.php');
    exit();
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_GET['id'];

        if ($_GET['table'] == "users") {

            // Configuration
            $uploadDirectory = '../assets/images/user-images/';

            // Get the uploaded file details
            $fileName = basename($_FILES['update-image']['name']);
            $targetPath = $uploadDirectory . $fileName;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));

            // Check if the file is an image
            $check = getimagesize($_FILES['update-image']['tmp_name']);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if the file already exists
            if (file_exists($targetPath)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size (you can adjust the size limit)
            if ($_FILES['update-image']['size'] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats (you can adjust the allowed formats)
            if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            if ($uploadOk) {
                if (move_uploaded_file($_FILES['update-image']['tmp_name'], $targetPath)) {
                    echo "image uploaded succesfully!";
                } else {
                    header('location: users.php?image-couldnt-be-uploaded');
                }
            }

            $name = mysqli_real_escape_string($conn, $_POST['update-name']);
            $surname = mysqli_real_escape_string($conn, $_POST['update-surname']);
            $email = mysqli_real_escape_string($conn, $_POST['update-mail']);
            $pwd = mysqli_real_escape_string($conn, $_POST['update-password']);
            $cpassword = mysqli_real_escape_string($conn, $_POST['update-cpassword']);
            $birthday = mysqli_real_escape_string($conn, $_POST['update-birthday']);
            $country = mysqli_real_escape_string($conn, $_POST['update-country']);
            $province = mysqli_real_escape_string($conn, $_POST['update-province']);
            $city = mysqli_real_escape_string($conn, $_POST['update-city']);
            $phone = mysqli_real_escape_string($conn, $_POST['update-phone']);
            $address = mysqli_real_escape_string($conn, $_POST['update-address']);
            $image = mysqli_real_escape_string($conn, $_POST['update-image']);
            $active = mysqli_real_escape_string($conn, $_POST['update-active']);

            $update = "UPDATE `users` SET 
            `email` = ?, `pwd` = ?, `name` = ?, `surname` = ?,  
            `birthdate` = ?, `country` = ?, `province` = ?, 
            `city` = ?, `phone`= ?, `address` = ?, `user_img` = ?,
            `active` = ?
            WHERE id = ?";


            if ($stmt = mysqli_prepare($conn, $update)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssssssssssss", $param_email, $param_password, $param_name, $param_surname, $param_birthday, $param_country, $param_province, $param_city, $param_phone, $param_address, $param_image, $param_active, $param_id);

                // Set parameters
                $param_email = $email;
                $param_password = password_hash($pwd, PASSWORD_DEFAULT); // Creates a password hash
                $param_name = $name;
                $param_surname = $surname;
                $param_birthday = $birthday;
                $param_country = $country;
                $param_province = $province;
                $param_city = $city;
                $param_phone = $phone;
                $param_address = $address;
                $param_image = $image;
                $param_active = $active;
                $param_id = $id;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    header('location: users.php?update=successfull');
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            } else {
                header('location: users.php?mysqliproblem');
            }
        } elseif ($_GET['table'] == "cars") {

            // Configuration
            $uploadDirectory = '../assets/images/cars/';

            // Get the uploaded file details
            $fileName = basename($_FILES['update-car-image']['name']);
            $targetPath = $uploadDirectory . $fileName;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));

            // Check if the file is an image
            $check = getimagesize($_FILES['update-car-image']['tmp_name']);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if the file already exists
            if (file_exists($targetPath)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size (you can adjust the size limit)
            if ($_FILES['update-car-image']['size'] > 50000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats (you can adjust the allowed formats)
            if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            if ($uploadOk) {
                if (move_uploaded_file($_FILES['update-car-image']['tmp_name'], $targetPath)) {
                    echo "image uploaded succesfully!";
                } else {
                    header('location: agencies.php?image-couldnt-be-uploaded');
                }
            }

            $image = $fileName;
            $model = mysqli_real_escape_string($conn, $_POST['update-model']);
            $gear = mysqli_real_escape_string($conn, $_POST['update-gear']);
            $fuel = mysqli_real_escape_string($conn, $_POST['update-fuel']);
            $class = mysqli_real_escape_string($conn, $_POST['update-class']);
            $year = mysqli_real_escape_string($conn, $_POST['update-year']);
            $km = mysqli_real_escape_string($conn, $_POST['update-km']);
            $color = mysqli_real_escape_string($conn, $_POST['update-color']);
            $active = mysqli_real_escape_string($conn, $_POST['update-active']);

            $update = "UPDATE `cars` SET 
            `image` = ?, `model` = ?, `gear` = ?, `fuel` = ?,  
            `class` = ?, `year` = ?, `km` = ?, 
            `color` = ?, `active` = ?
            WHERE id = ?";


            if ($stmt = mysqli_prepare($conn, $update)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssssssss", $param_image, $param_model, $param_gear, $param_fuel, $param_class, $param_year, $param_km, $param_color, $param_active);

                // Set parameters
                $param_image = $image;
                $param_model = $model;
                $param_gear = $gear;
                $param_fuel = $fuel;
                $param_class = $class;
                $param_year = $year;
                $param_km = $km;
                $param_color = $color;
                $param_active = $active;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    header('location: cars.php?update=successfull');
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            } else {
                header('location: cars.php?mysqliproblem');
            }
        } elseif ($_GET['table'] == "agencies") {
            $name = mysqli_real_escape_string($conn, $_POST['update-name']);
            $phone = mysqli_real_escape_string($conn, $_POST['update-phone']);
            $email = mysqli_real_escape_string($conn, $_POST['update-email']);
            $location = mysqli_real_escape_string($conn, $_POST['update-location']);
            $stars = mysqli_real_escape_string($conn, $_POST['update-stars']);
            $active = mysqli_real_escape_string($conn, $_POST['update-active']);

            $update = "UPDATE `agencies` SET 
            `name` = ?, `phone` = ?, `email` = ?,  
            `location` = ?, `stars` = ?, `active` = ?
            WHERE id = ?";


            if ($stmt = mysqli_prepare($conn, $update)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_phone, $param_email, $param_location, $param_stars, $param_active);

                // Set parameters
                $param_name = $name;
                $param_phone = $phone;
                $param_email = $email;
                $param_location = $location;
                $param_stars = $stars;
                $param_active = $active;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    header('location: agencies.php?update=successfull');
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            } else {
                header('location: agencies.php?mysqliproblem');
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Update - Quakefocus Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <?php
    include_once "sidenav.html";
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="content py-5 d-flex justify-content-center">
                <form action="" method="POST" enctype="multipart/form-data" class="w-50 text-light">
                    <?php
                    $id = $_GET['id'];

                    if ($_GET['table'] == "users") {

                        $stmt = $conn->prepare('SELECT * FROM users WHERE id = ' . $id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();

                        echo "
                        <!-- Name input -->
                        <h5 class='text-dark'>Personal Info (Required)</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Name' name='update-name' type='text' value='" . $row['name'] . "'>
                            <input required class='form-control me-1' placeholder='Surname' name='update-surname' type='text' value='" . $row['surname'] . "'>
                            <input required class='form-control' placeholder='E-mail' name='update-mail' id='mail' type='email' value='" . $row['email'] . "'>
                        </div>

                        <!-- Password input -->
                        <h5 class='text-dark'>Password (Required)</h5>
                        <div class='form-outline mb-4'>
                            <input required class='form-control me-1' placeholder='Password' name='update-password' id='password' type='password' value='" . $row['pwd'] . "'>
                        </div>

                        <!-- Birthday input -->
                        <h5 class='text-dark'>Birthdate (Optional)</h5>
                        <div class='form-outline mb-4'>
                            <input class='form-control' placeholder='dd.mm.yyyy' name='update-birthday' type='date' value='" . $row['birthdate'] . "'>
                        </div>

                        <!-- Adress Input -->
                        <h5 class='text-dark'>Address (Optional)</h5>
                        <div class='form-outline mb-4'>
                            <input class='form-control me-1' placeholder='Country' name='update-country' type='text' value='" . $row['country'] . "'>
                            <input class='form-control me-1' placeholder='Province' name='update-province' type='text' value='" . $row['province'] . "'>
                            <input class='form-control' placeholder='City' name='update-city' type='text' value='" . $row['city'] . "'>
                        </div>
                        <!-- Contact Info -->
                        <h5 class='text-dark'>Contact Info (Optional)</h5>
                        <div class='form-outline mb-4'>
                            <input class='form-control me-1' placeholder='Phone' name='update-phone' type='text' value='" . $row['phone'] . "'>
                            <input class='form-control' placeholder='Address' name='update-address' type='text' value='" . $row['address'] . "'>
                        </div>

                        <!-- Image -->
                        <h5 class='text-dark'>Image (Optional)</h5>
                        <div class='form-outline mb-4'>
                            <input class='form-control me-1' placeholder='Image' name='update-image' type='file' value='" . $row['user_img'] . "'>
                        </div>

                        <!-- Only Admins -->
                        <h5 class='text-dark'>Only Admins (Optional)</h5>
                        <div class='form-outline mb-4'>
                            <input class='form-control' placeholder='Active' name='update-active' type='text' value='" . $row['active'] . "'>
                        </div>
                        <div class='row mb-4'>
                            <div class='col'>
                                <!-- Submit button -->
                                <input type='submit' class='btn btn-primary mb-4 w-100' value='Update the record'>
                            </div>
                        </div>";
                    } elseif ($_GET['table'] == "cars") {

                        $stmt = $conn->prepare('SELECT * FROM cars WHERE id = ' . $id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();

                        echo "
                        <!-- Image -->
							<h5 class='text-dark'>Image</h5>
							<div class='form-outline mb-4'>
								<input class='form-control me-1' placeholder='Image' name='update-car-image' type='file' value='" . $row['image'] . "''>
							</div>
							
							<!-- Model input -->
							<h5 class='text-dark'>Car Information</h5>
							<div class='form-outline mb-4'>
								<input class='form-control me-1 mb-3' placeholder='Model' name='update-model' type='text' value='" . $row['model'] . "'>
								<select class='form-control me-1 mb-3' placeholder='Gear' name='update-gear'>
									<option value='' disabled selected>" . $row['gear'] . "</option>
									<option value='Manual'>Manual Transmission</option>
									<option value='Automatic'>Automatic Transmission</option>
									<option value='Semi-Automatic'>Semi-Automatic Transmission</option>
									<option value='Continuous Variable'>Continuous Variable Transmission</option>
									<option value='Dual-Clutch'>Dual-Clutch Transmission</option>
									<option value='Automated Manual'>Automated Manual Transmission</option>
								</select>
								<select class='form-control me-1 mb-3' placeholder='Fuel' name='update-fuel' type='text'>
									<option value='' disabled selected>" . $row['fuel'] . "</option>
									<option value='Gasoline'>Gasoline</option>
									<option value='Diesel'>Diesel</option>
									<option value='LPG'>LPG (Liquid Petroleum Gas)</option>
									<option value='Electricity'>Electricity</option>
								</select>

								<select class='form-control me-1 mb-3' placeholder='Class' name='update-class' type='text'>
									<option value='' disabled selected>" . $row['class'] . "</option>
									<option value='Sedan'>Sedan</option>
									<option value='Hatchback'>Hatchback</option>
									<option value='SUV'>SUV (Sport Utility Vehicle)</option>
									<option value='Coupe'>Coupe</option>
									<option value='Cabriolet'>Cabriolet</option>
									<option value='Minivan'>Minivan</option>
								</select>

								<input class='form-control me-1 mb-3' placeholder='Year' name='update-year' type='text' value='" . $row['year'] . "'>
								<input class='form-control me-1 mb-3' placeholder='KM' name='update-km' type='text' value='" . $row['km'] . "'>
								
								<select class='form-control me-1 mb-3' placeholder='Color' name='update-color' type='text'>
									<option value='' disabled selected>" . $row['color'] . "</option>
									<option value='White'>White</option>
									<option value='Black'>Black</option>
									<option value='Silver/Gray'>Silver/Gray</option>
									<option value='Blue'>Blue</option>
									<option value='Red'>Red</option>
									<option value='Yellow'>Yellow</option>
									<option value='Other'>Other</option>
								</select>
							</div>

							<!-- Important -->
							<h5 class='text-dark'>Important</h5>
							<div class='form-outline mb-4'>
								<input class='form-control' placeholder='Active' name='update-active' type='text' value='" . $row['active'] . "'>
							</div>
							<!-- 2 column grid layout for inline styling -->
							<div class='row mb-4'>
								<div class='col'>
									<!-- Submit button -->
									<input type='submit' class='btn btn-primary mb-4 w-100' value='update the record'>
								</div>
							</div>";
                    } elseif ($_GET['table'] == "agencies") {

                        $stmt = $conn->prepare('SELECT * FROM agencies WHERE id = ' . $id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();

                        echo "
							
							<!-- name input -->
							<h5 class='text-dark'>Agency Information</h5>
							<div class='form-outline mb-4'>
								<input class='form-control me-1 mb-3' placeholder='name' name='update-name' type='text' value='" . $row['name'] . "'>
								<input class='form-control me-1 mb-3' placeholder='phone' name='update-phone' type='text' value='" . $row['phone'] . "'>
								<input class='form-control me-1 mb-3' placeholder='email' name='update-email' type='text' value='" . $row['email'] . "'>
								<input class='form-control me-1 mb-3' placeholder='location' name='update-location' type='text' value='" . $row['location'] . "'>

								<select required class='form-control me-1 mb-3' placeholder='Stars' name='update-stars' type='text'>
                                ";
                        switch ($row['stars']) {
                            case 1:
                                echo "<option value='1 selected'>⭐</option>         
                                      <option value='2'>⭐⭐</option>
                                      <option value='3'>⭐⭐⭐</option>
                                      <option value='4'>⭐⭐⭐⭐</option>
                                      <option value='5'>⭐⭐⭐⭐⭐</option>	";

                            case 2:
                                echo "<option value='1'>⭐</option>  
                                      <option value='2 selected'>⭐⭐</option>
                                      <option value='3'>⭐⭐⭐</option>
                                      <option value='4'>⭐⭐⭐⭐</option>
                                      <option value='5'>⭐⭐⭐⭐⭐</option>	";
                            case 3:
                                echo "<option value='1'>⭐</option>
                                      <option value='2'>⭐⭐</option>
                                      <option value='3 selected'>⭐⭐⭐</option>
                                      <option value='4'>⭐⭐⭐⭐</option>
                                      <option value='5'>⭐⭐⭐⭐⭐</option>";
                            case 4:
                                echo "<option value='1'>⭐</option>
                                      <option value='2'>⭐⭐</option>
                                      <option value='3'>⭐⭐⭐</option>
                                      <option value='4 selected'>⭐⭐⭐⭐</option>
                                      <option value='5'>⭐⭐⭐⭐⭐</option>";
                            case 5:
                                echo "<option value='1'>⭐</option>
                                      <option value='2'>⭐⭐</option>
                                      <option value='3'>⭐⭐⭐</option>
                                      <option value='4'>⭐⭐⭐⭐</option>
                                      <option value='5' selected>⭐⭐⭐⭐⭐</option>";
                        }
                        echo
                        "
								</select>
							</div>

							<!-- Important -->
							<h5 class='text-dark'>Important</h5>
							<div class='form-outline mb-4'>
                            <select required class='form-control me-1 mb-3' placeholder='Active' name='update-active' type='text' value'" . $row['active'] . "'>
                                <option value='1' selected>Active</option>
                                <option value='0'>Not Active</option>
							</div>

							<!-- 2 column grid layout for inline styling -->
							<div class='row mb-4'>
								<div class='col'>
									<!-- Submit button -->
									<input type='submit' class='btn btn-primary mb-4 w-100' value='update the record'>
								</div>
							</div>";
                    } else {
                        include_once '404.html';
                    }

                    ?>
                </form>
            </div>
        </main>


        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; QuakeFocus</div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

</body>

</html>