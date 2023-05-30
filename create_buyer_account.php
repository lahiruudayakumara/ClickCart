<?php

	include './conn.php';

	if(isset($_POST['submit'])) {
		$fname = $_POST['firstName'];
		$lname = $_POST['lastName'];
		$address = $_POST['address'];
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

			$query = "INSERT INTO buyer VALUES ('', '{$fname}', '{$lname}', '{$email}', '{$password}','{$address}')";

			$result = mysqli_query($con, $query);

			if ($result) {
				echo "<script>alert('Your account created Now you can login using email and password'); window.location = 'login.php';</script>";
			} else {
				echo "<script>alert('Your account not created please try again'); window.location = 'create_account.php';</script>";
			}
		}
		
	}
	else {
		header('Location: create_account.php');
	}

	mysqli_close($con);
?>