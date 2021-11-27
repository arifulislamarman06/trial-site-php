<?php
	$db = "registration";
	$username = "root";
	$password = "";
	$server = 'localhost';

	$connect = mysqli_connect($server,$username,$password,$db);

	if ($connect) {
		
	} else {
		echo 'failed';
	}
	
?>