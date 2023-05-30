<?php

	include './conn.php';

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$uName = $_POST['userName'];
		$location = $_POST['location'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$buyerCheck = "SELECT * FROM buyer WHERE email='$email'";
		$result1 = mysqli_query($con, $buyerCheck);
		$buyer_row_count = mysqli_num_rows($result1);

		$sellerCheck = "SELECT * FROM seller WHERE email='$email'";
		$result2 = mysqli_query($con, $sellerCheck);
		$seller_row_count = mysqli_num_rows($result2);

		if ($buyer_row_count == 1) {

			echo "<script>alert('This email already use. Please try using other email.'); window.location = 'create_account.php';</script>";

		} else if($seller_row_count == 1) {

			echo "<script>alert('This email already use. Please try using other email.'); window.location = 'create_account.php';</script>";

		}else  {

			$query = "INSERT INTO seller VALUES ('', '{$uName}', '{$location}', '', '{$email}', '{$password}')";

			$result = mysqli_query($con, $query);

			if ($result) {
				echo "<script>alert('Your seller account created Now you can loginn email and password'); window.location = 'login.php';</script>";
			} else {
				echo "<script>alert('Your account not created please try again'); window.location = 'create_account.php';</script>";
			}
		}		
		
	}
	else {
		echo "not work";
	}
?>