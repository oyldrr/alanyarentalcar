<?php
// MYSQLI
$conn = mysqli_connect('localhost', 'root', 'password', 'alanyarentalcar');

    if(!$conn)
    {
        echo 'Connection error : ' . mysqli_connect_error();
    }

// PDO
try {
	$connection= new PDO("mysql:host=localhost;dbname=alanyarentalcar;charset=utf8", 'root', 'password');
} catch (Exception $e) {
	
	echo $e->getMessage();
}
