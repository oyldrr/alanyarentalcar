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
		if ($_GET['table'] == "users") {

			// Configuration
			$uploadDirectory = '../assets/images/user-images/';

			// Get the uploaded file details
			$fileName = basename($_FILES['insert-image']['name']);
			$targetPath = $uploadDirectory . $fileName;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));

			// Check if the file is an image
			$check = getimagesize($_FILES['insert-image']['tmp_name']);
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
			if ($_FILES['insert-image']['size'] > 500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}

			// Allow certain file formats (you can adjust the allowed formats)
			if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}

			if ($uploadOk) {
				if (move_uploaded_file($_FILES['insert-image']['tmp_name'], $targetPath)) {
					echo "image uploaded succesfully!";
				} else {
					header('location: users.php?image-couldnt-be-uploaded');
				}
			}


			$name = mysqli_real_escape_string($conn, $_POST['insert-name']);
			$surname = mysqli_real_escape_string($conn, $_POST['insert-surname']);
			$email = mysqli_real_escape_string($conn, $_POST['insert-mail']);
			$pwd = mysqli_real_escape_string($conn, $_POST['insert-password']);
			$cpassword = mysqli_real_escape_string($conn, $_POST['insert-cpassword']);
			$birthday = mysqli_real_escape_string($conn, $_POST['insert-birthday']);
			$country = mysqli_real_escape_string($conn, $_POST['insert-country']);
			$province = mysqli_real_escape_string($conn, $_POST['insert-province']);
			$city = mysqli_real_escape_string($conn, $_POST['insert-city']);
			$phone = mysqli_real_escape_string($conn, $_POST['insert-phone']);
			$address = mysqli_real_escape_string($conn, $_POST['insert-address']);
			$image = $fileName;
			$active = mysqli_real_escape_string($conn, $_POST['insert-active']);

			$insert = "INSERT INTO `users` 
			(`email`, `pwd`, `name`, `surname`, `birthdate`, `country`, `province`, `city`, `phone`, `address`, `user_img`, `active`)  
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = mysqli_prepare($conn, $insert)) {
				// Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "ssssssssssss", $param_email, $param_password, $param_name, $param_surname, $param_birthday, $param_country, $param_province, $param_city, $param_phone, $param_address, $param_image, $param_active);

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

				// Attempt to execute the prepared statement
				if (mysqli_stmt_execute($stmt)) {
					header('location: users.php?insertion=successfull');
					exit();
				} else {
					echo "Oops! Something went wrong. Please try again later.";
				}

				// Close statement
				mysqli_stmt_close($stmt);
			} else {
				header('location: insert.php?table=users&mysqliproblem');
			}
		} elseif ($_GET['table'] == "cars") {
			// Configuration
			$uploadDirectory = '../assets/images/cars/';

			// Get the uploaded file details
			$fileName = basename($_FILES['insert-car-image']['name']);
			$targetPath = $uploadDirectory . $fileName;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));

			// Check if the file is an image
			$check = getimagesize($_FILES['insert-car-image']['tmp_name']);
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
			if ($_FILES['insert-car-image']['size'] > 500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}

			// Allow certain file formats (you can adjust the allowed formats)
			if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}

			if ($uploadOk) {
				if (move_uploaded_file($_FILES['insert-car-image']['tmp_name'], $targetPath)) {
					echo "image uploaded succesfully!";
				} else {
					header('location:cars.php?image-couldnt-be-uploaded');
				}
			}

			$image = $fileName;
			$model = mysqli_real_escape_string($conn, $_POST['insert-model']);
			$gear = mysqli_real_escape_string($conn, $_POST['insert-gear']);
			$fuel = mysqli_real_escape_string($conn, $_POST['insert-fuel']);
			$class = mysqli_real_escape_string($conn, $_POST['insert-class']);
			$year = mysqli_real_escape_string($conn, $_POST['insert-year']);
			$km = mysqli_real_escape_string($conn, $_POST['insert-km']);
			$color = mysqli_real_escape_string($conn, $_POST['insert-color']);
			$active = mysqli_real_escape_string($conn, $_POST['insert-active']);

			$insert = "INSERT INTO `cars` 
			(`image`, `model`, `gear`, `fuel`, `class`, `year`, `km`, `color`, `active`)  
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = mysqli_prepare($conn, $insert)) {
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
					header('location: cars.php?insertion=successfull');
					exit();
				} else {
					echo "Oops! Something went wrong. Please try again later.";
				}

				// Close statement
				mysqli_stmt_close($stmt);
			} else {
				header('location: insert.php?table=cars&mysqliproblem');
			}
		} elseif ($_GET['table'] == "agencies") {
			// Configuration
			$uploadDirectory = '../assets/images/agencies/';

			// Get the uploaded file details
			$fileName = basename($_FILES['insert-agency-image']['name']);
			$targetPath = $uploadDirectory . $fileName;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));

			// Check if the file is an image
			$check = getimagesize($_FILES['insert-agency-image']['tmp_name']);
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
			if ($_FILES['insert-agency-image']['size'] > 500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}

			// Allow certain file formats (you can adjust the allowed formats)
			if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}

			if ($uploadOk) {
				if (move_uploaded_file($_FILES['insert-agency-image']['tmp_name'], $targetPath)) {
					echo "image uploaded succesfully!";
				} else {
					header('location:agencies.php?image-couldnt-be-uploaded');
				}
			}

			$logo = $fileName;
			$name = mysqli_real_escape_string($conn, $_POST['insert-name']);
			$phone = mysqli_real_escape_string($conn, $_POST['insert-phone']);
			$email = mysqli_real_escape_string($conn, $_POST['insert-email']);
			$location = mysqli_real_escape_string($conn, $_POST['insert-location']);
			$stars = mysqli_real_escape_string($conn, $_POST['insert-stars']);

			$insert = "INSERT INTO `agencies` 
			(`logo`, `name`, `phone`, `email`, `location`, `stars`)  
			VALUES (?, ?, ?, ?, ?, ?)";

			if ($stmt = mysqli_prepare($conn, $insert)) {
				// Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "ssssss", $param_logo, $param_name, $param_phone, $param_email, $param_location, $param_stars);

				// Set parameters
				$param_logo = $logo;
				$param_name = $name;
				$param_phone = $phone;
				$param_email = $email;
				$param_location = $location;
				$param_stars = $stars;

				// Attempt to execute the prepared statement
				if (mysqli_stmt_execute($stmt)) {
					header('location: agencies.php?insertion=successfull');
					exit();
				} else {
					echo "Oops! Something went wrong. Please try again later.";
				}

				// Close statement
				mysqli_stmt_close($stmt);
			} else {
				header('location: insert.php?table=agencies&mysqliproblem');
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
	<title>Insert - Alanya Rental Car Admin</title>
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
					if ($_GET['table'] == "users") {
						echo "
							<!-- Name input -->
							<h5 class='text-dark'>Personal Info (Required)</h5>
							<div class='form-outline mb-4'>
								<input required class='form-control me-1' placeholder='Name' name='insert-name' type='text'>
								<input required class='form-control me-1' placeholder='Surname' name='insert-surname' type='text'>
								<input required class='form-control' placeholder='E-mail' name='insert-mail' id='mail' type='email'>
							</div>

							<!-- Password input -->
							<h5 class='text-dark'>Password (Required)</h5>
							<div class='form-outline mb-4'>
								<input required class='form-control me-1' placeholder='Password' name='insert-password' id='password' type='password'>
								<input required class='form-control ' placeholder='Confirm password' name='insert-cpassword' id='cpassword' type='password'>
							</div>

							<!-- Birthday input -->
							<h5 class='text-dark'>Birthdate (Optional)</h5>
							<div class='form-outline mb-4'>
								<input class='form-control' placeholder='dd.mm.yyyy' name='insert-birthday' type='date'>
							</div>

							<!-- Adress Input -->
							<h5 class='text-dark'>Address (Optional)</h5>
							<div class='form-outline mb-4'>
								<input class='form-control me-1' placeholder='Country' name='insert-country' type='text'>
								<input class='form-control me-1' placeholder='Province' name='insert-province' type='text'>
								<input class='form-control' placeholder='City' name='insert-city' type='text'>
							</div>
							<!-- Contact Info -->
							<h5 class='text-dark'>Contact Info (Optional)</h5>
							<div class='form-outline mb-4'>
								<input class='form-control me-1' placeholder='Phone' name='insert-phone' type='text'>
								<input class='form-control' placeholder='Address' name='insert-address' type='text'>
							</div>

							<!-- Image -->
							<h5 class='text-dark'>Image (Optional)</h5>
							<div class='form-outline mb-4'>
								<input class='form-control me-1' placeholder='Image' name='insert-image' type='file'>
							</div>

							<!-- Only Admins -->
							<h5 class='text-dark'>Only Admins (Optional)</h5>
							<div class='form-outline mb-4'>
								<input class='form-control' placeholder='Active' name='insert-active' type='text'>
							</div>
							<!-- 2 column grid layout for inline styling -->
							<div class='row mb-4'>
								<div class='col'>
									<!-- Submit button -->
									<input type='submit' class='btn btn-primary mb-4 w-100' value='Insert the record'>
								</div>
							</div>";
					} elseif ($_GET['table'] == "cars") {
						echo "
							<!-- Image -->
							<h5 class='text-dark'>Image (Required)</h5>
							<div class='form-outline mb-4'>
								<input class='form-control me-1' placeholder='Image' name='insert-car-image' type='file'>
							</div>
							
							<!-- Model input -->
							<h5 class='text-dark'>Car Information (Required)</h5>
							<div class='form-outline mb-4'>
								<input required class='form-control me-1 mb-3' placeholder='Model' name='insert-model' type='text'>
								<select required class='form-control me-1 mb-3' placeholder='Gear' name='insert-gear'>
									<option value='' disabled selected>Gear</option>
									<option value='Manual'>Manual Transmission</option>
									<option value='Automatic'>Automatic Transmission</option>
									<option value='Semi-Automatic'>Semi-Automatic Transmission</option>
									<option value='Continuous Variable'>Continuous Variable Transmission</option>
									<option value='Dual-Clutch'>Dual-Clutch Transmission</option>
									<option value='Automated Manual'>Automated Manual Transmission</option>
								</select>
								<select required class='form-control me-1 mb-3' placeholder='Fuel' name='insert-fuel' type='text'>
									<option value='' disabled selected>Fuel</option>
									<option value='Gasoline'>Gasoline</option>
									<option value='Diesel'>Diesel</option>
									<option value='LPG'>LPG (Liquid Petroleum Gas)</option>
									<option value='Electricity'>Electricity</option>
								</select>

								<select required class='form-control me-1 mb-3' placeholder='Class' name='insert-class' type='text'>
									<option value='' disabled selected>Class</option>
									<option value='Sedan'>Sedan</option>
									<option value='Hatchback'>Hatchback</option>
									<option value='SUV'>SUV (Sport Utility Vehicle)</option>
									<option value='Coupe'>Coupe</option>
									<option value='Cabriolet'>Cabriolet</option>
									<option value='Minivan'>Minivan</option>
								</select>

								<input required class='form-control me-1 mb-3' placeholder='Year' name='insert-year' type='text'>
								<input required class='form-control me-1 mb-3' placeholder='KM' name='insert-km' type='text'>
								
								<select required class='form-control me-1 mb-3' placeholder='Color' name='insert-color' type='text'>
									<option value='' disabled selected>Color</option>
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
							<h5 class='text-dark'>Important (Required)</h5>
							<div class='form-outline mb-4'>
								<input class='form-control' placeholder='Active' name='insert-active' type='text'>
							</div>
							<!-- 2 column grid layout for inline styling -->
							<div class='row mb-4'>
								<div class='col'>
									<!-- Submit button -->
									<input type='submit' class='btn btn-primary mb-4 w-100' value='Insert the record'>
								</div>
							</div>";
					} elseif ($_GET['table'] == "agencies") {
						echo "
							<!-- Image -->
							<h5 class='text-dark'>Image (Required)</h5>
							<div class='form-outline mb-4'>
								<input class='form-control me-1' placeholder='Image' name='insert-agency-image' type='file'>
							</div>
							
							<!-- Model input -->
							<h5 class='text-dark'>Agency Information (Required)</h5>
							<div class='form-outline mb-4'>
								<input required class='form-control me-1 mb-3' placeholder='Name' name='insert-name' type='text'>
								<input required class='form-control me-1 mb-3' placeholder='Phone' name='insert-phone' type='tel'>
								<input required class='form-control me-1 mb-3' placeholder='Email' name='insert-email' type='email'>
								<input required class='form-control me-1 mb-3' placeholder='Location' name='insert-location' type='text'>

								<select required class='form-control me-1 mb-3' placeholder='Stars' name='insert-stars' type='text'>
									<option value='' disabled selected>Stars</option>
									<option value='1'>⭐</option>
									<option value='2'>⭐⭐</option>
									<option value='3'>⭐⭐⭐</option>
									<option value='4'>⭐⭐⭐⭐</option>
									<option value='5'>⭐⭐⭐⭐⭐</option>
								</select>
							</div>
							<!-- 2 column grid layout for inline styling -->
							<div class='row mb-4'>
								<div class='col'>
									<!-- Submit button -->
									<input type='submit' class='btn btn-primary mb-4 w-100' value='Insert the record'>
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
					<div class="text-muted">Copyright &copy; Alanya Rental Car</div>
				</div>
			</div>
		</footer>
	</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="js/scripts.js"></script>

</body>

</html>