<?php 

	require './conn.php'; 

	session_start();

	if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'buyer') {
		$bID = $_SESSION['buyer_ID'];

		if(isset($_POST['update'])){
			$bfname = $_POST['fname'];
			$blname = $_POST['lname'];
			$baddress = $_POST['address'];

			$query="UPDATE buyer SET fName='$bfname', lName='$blname', address='$baddress' WHERE buyer_ID= '$bID'";
		
			if ($con->query($query)) {

				echo "<script>alert('Profile upadeted sucessfully'); window.location = 'buyer_account_manage.php';</script>";
			}  else {
				echo "<script>alert('Profile upadeted Unsucessfully'); window.location = 'buyer_account_manage.php';</script>";
			}	
		} else if(isset($_POST['change'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];

			$query1="UPDATE buyer SET email = '$email', password = '$password' WHERE buyer_ID= '$bID'";
			if ($con->query($query1)) {

				echo "<script>alert('Email & Password upadeted sucessfully'); window.location = 'buyer_account_manage.php';</script>";
			}  else {
				echo "<script>alert('Email & Password upadeted Unsucessfully'); window.location = 'buyer_account_manage.php';</script>";
			}	
		} else {
			header('location: buyer_account_manage.php');
			exit();
		}
		
	} else {
		header('location: login.php');
		exit();
	}

	 $con->close();

?>

<!--reference: W3Schools-->