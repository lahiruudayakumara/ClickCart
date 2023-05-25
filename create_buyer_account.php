<?php

	include './conn.php';

	if(isset($_POST['submit'])) {
		$fname = $_POST['firstName'];
		$lname = $_POST['lastName'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		//echo $fname . " " . $lname . " " . $email . " " . $password ;

		$query = ("INSERT INTO buyer3 VALUES ('2', '', '{$fname}', '{$lname}', '{$email}', '{$password}','{$address}')");

		$result = mysqli_query($con, $query);

		if ($result) {
			echo "<script>alert('Your account created Now you can login using email and password'); window.location = 'login.php';</script>";
		} else {
			echo "<script>alert('Your account not created please try again')</script>";
		}

		
	}
	else {
		header('Location: create_account.php');
	}
?>