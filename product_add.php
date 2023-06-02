<?php
	 require './conn.php';

	 session_start();

	 if($_SESSION['user_role'] == "seller") {

	 	if (isset($_POST['submit'])) {

			$uploadDir = './images/';

	 		$s_ID = $_SESSION['seller_ID'];
	 		$name = $_POST['name'];
	 		$price = $_POST['price'];
			 
			 $fname = $_FILES["image"] ["name"];
			 $ftype = $_FILES["image"] ["type"];
			 $fsize = $_FILES["image"] ["size"];
			 $ftemp = $_FILES["image"] ["tmp_name"];
			 $ferror = $_FILES["image"] ["error"];

			 $filePath = $uploadDir . $fname;

			 if(file_exists($filePath)) {
				echo "<script>alert('have same file');</script>";
			 }

			 if ($ferror>0) {
				 # code...
				 $fname = 'icon/icon.png';	
			 } else {
				 move_uploaded_file($ftemp, "./images/" .$fname);
			 }
			 

	 		$query = "INSERT INTO product VALUES('', '{$s_ID}', '1', '{$name}', '{$fname}', '{$price}' ) ";

	 		$result = $con->query($query);

	 		if(isset($result)) {
	 			echo "<script>alert('Your Product Deatails Upladed'); window.location: 'seller_dashboard.php';</script>";
	 		} else {
				echo "<script>alert('error');</script>";
			}
	 	} else {
			echo "error";
		}

	 } else {
	 	header ('Login: login.php');
	 }

	 $con->close();

?>

