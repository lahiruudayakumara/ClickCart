<?php

	require './conn.php';

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$uName = $_POST['userName'];
		$location = $_POST['location'];
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

			$query3 = "INSERT INTO seller VALUES ('', '{$uName}', '{$location}', '{$email}', '{$password}')";

			$result3 = $con->query($query3);

			if ($result3) {
				echo "<script>alert('Your seller account created Now you can login email and password'); window.location = 'login.php';</script>";
			} else {
				echo "<script>alert('Your account not created please try again'); window.location = 'create_account.php';</script>";
			}
		}		
		
	}
	else {
		echo "not work";
	}

	$con->close();

?>