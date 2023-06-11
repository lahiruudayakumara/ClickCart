<?php

	require './conn.php';

	if(isset($_POST['submit'])) {
		$fname = $_POST['firstName'];
		$lname = $_POST['lastName'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query1 = "SELECT * FROM buyer WHERE email='$email'";
		$result1 = $con->query($query1);
		$buyer_row_count = $result1->num_rows;

		$query2 = "SELECT * FROM seller WHERE email='$email'";
		$result2 = $con->query($query2);
		$seller_row_count = $result2->num_rows;

		if ($buyer_row_count == 1) {

			echo "<script>alert('This email already use. Please try using other email.'); window.location = 'create_account.php';</script>";

		} else if($seller_row_count == 1) {

			echo "<script>alert('This email already use. Please try using other email.'); window.location = 'create_account.php';</script>";

		}else  {

			$query3 = "INSERT INTO buyer VALUES ('', '{$fname}', '{$lname}', '{$email}', '{$password}','{$address}')";

			$result3 = $con->query($query3);

			if ($result3) {
				echo "<script>alert('Your account created Now you can login using email and password'); window.location = 'login.php';</script>";
			} else {
				echo "<script>alert('Your account not created please try again'); window.location = 'create_account.php';</script>";
			}
		}
		
	}
	else {
		header('Location: create_account.php');
	}

	$con->close();
?>