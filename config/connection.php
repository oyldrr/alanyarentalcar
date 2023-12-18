<?php
// MYSQLI
$conn = mysqli_connect('localhost', 'root', 'password', 'alanyarentalcar');

if (!$conn) {
    echo 'Connection error : ' . mysqli_connect_error();
} else {
    $sql = "INSERT INTO `counter` (`visited_page`, `REMOTE_ADDR`, `HTTP_X_FORWARDED_FOR`) VALUES ('" . $_SERVER['PHP_SELF'] . "', '" . $_SERVER['REMOTE_ADDR'] . "', '" . $_SERVER['HTTP_X_FORWARDED_FOR'] . "')";
    $conn->query($sql);
}

// PDO
try {
    $connection = new PDO("mysql:host=localhost;dbname=alanyarentalcar;charset=utf8", 'root', 'password');
} catch (Exception $e) {

    echo $e->getMessage();
}
