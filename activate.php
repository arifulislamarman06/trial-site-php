<?php
session_start();
include 'dbconfig.php';

if (isset($_GET['token'])) {
	$token = $_GET['token'];
	$updatequery = "UPDATE `signup` SET `status`='active' WHERE token='$token'";
	$query = mysqli_query($connect, $updatequery);

	if ($query) {
		if (isset($_SESSION['msg'])) {
			$_SESSION['msg'] = "Verification Successful. Please Log In";
			header('location: login.php');
		}else{
			$_SESSION['msg'] = "You are logged out. Please Log In";
			header('location: login.php');
		}
	}else{
			$_SESSION['msg'] = 'Verification Unsuccessful';
			header('location: registration.php');
	}
}
?>