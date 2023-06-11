<?php
	 require './conn.php';

	 session_start();

	 if($_SESSION['user_role'] == "seller") {

	 	if (isset($_POST['submit'])) {

			$uploadDir = './images/product/';

	 		$s_ID = $_SESSION['seller_ID'];
	 		$name = $_POST['name'];
	 		$price = $_POST['price'];
			$brand = $_POST['brand'];
			$desc = $_POST['Description'];
			$c_ID = $_POST['category'];
			 
			$fname = $_FILES["image"] ["name"];
			$ftype = $_FILES["image"] ["type"];
			$fsize = $_FILES["image"] ["size"];
			$ftemp = $_FILES["image"] ["tmp_name"];
			$ferror = $_FILES["image"] ["error"];

			$filePath = $uploadDir . $fname;

			if (file_exists($filePath)) {
				echo "<script>alert('have same file'); window.location = 'seller_dashboard.php';</script>";
			} else {

				if ($ferror>0) {
					echo "<script>alert('error uploading file please try again'); window.location = 'seller_dashboard.php';</script>";
				} else {
					move_uploaded_file($ftemp, "./images/product/" .$fname);
   
					$query = "INSERT INTO product VALUES('', '{$s_ID}', '{$c_ID}', '{$name}', '{$brand}', '{$desc}', '{$fname}', '{$price}' ) ";
					$result = $con->query($query);
	   
					if(isset($result)) {
						echo "<script>alert('Your Product Deatails Upload Sucessfully'); window.location = 'seller_dashboard.php';</script>";
					} else {
						
					   echo "<script>alert('our Product Deatails Upload Unsucessfully');</script>";
				   }
				}

			}
		}

	} else {
	 	header ('Login: login.php');
	}

	 $con->close();

?>

