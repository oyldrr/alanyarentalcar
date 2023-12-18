<?php
session_start();
require_once "config/connection.php";


// payment.php process

if (isset($_POST['odemegonder'])) {

	$savePayment=$conn->prepare("INSERT into cards SET 

		cardNo=:cardNo,

		cardHolder=:cardHolder,

		month=:month,

		year=:year,

		cvv=:cvv

		");

	$insert=$savePayment->execute(array(

   		'cardNo'=>$_POST['cardNo'],

		'cardHolder'=>$_POST['cardHolder'],

		'month'=>$_POST['month'],

	   	'year'=>$_POST['year'],

		'cvv'=>$_POST['cvv']

	));

	if ($insert) {
		header("Location:index.php?successfull");

	}

	else{
		header("Location:payment.php?an-error-occured");
	}



}
?>