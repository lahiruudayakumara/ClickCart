<?php

	include './conn.php';

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$uName = $_POST['userName'];
		$location = $_POST['location'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = ("INSERT INTO seller3 VALUES ('1', '', '{$uName}', '{$location}', '{$email}', '{$password}')");

		$result = mysqli_query($con, $query);

		if ($result) {
			echo "<script>alert('Your seller account created Now you can loginn email and password'); window.location = 'login.php';</script>";
		} else {
			echo "<script>alert('Your account not created please try again'); window.location = 'create_account.php';</script>";
		}

		
		
	}
	else {
		echo "not work";
	}
?>