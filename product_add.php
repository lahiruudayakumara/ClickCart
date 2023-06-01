<?php
	 include './conn.php';

	 session_start();

	 if($_SESSION['user_role'] == "seller") {

	 	if (isset($_POST['submit'])) {
	 		$s_ID = $_SESSION['seller_ID'];
	 		$name = $_POST['name'];
	 		$image = $_FILES['image'];
	 		$price = $_POST['price'];



	 		$query = "INSERT INTO product VALUES('', '{$s_ID}', '1', '{$name}', '{$image}', '{$price}' ) ";

	 		$result = mysqli_query($con, $query);

	 		if(isset($result)) {
	 			header("Location: seller_dashboard.php");
	 		}
	 	}


	 	?>
			<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Add product</title>
				<style type="text/css">
					form {
						margin-top: 40px;
						width: 300px;
						margin: auto;
						background-color: #fff;
						align-items: center;
						align-content: center;
						padding: 10px;
						text-align: center;
						border-radius: 5px;
						box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
					}
					form input {
						height: 30px;
						margin-bottom: 3px;
						width: 100%;
						outline: none;
					}
					select {
						height: 30px;
						width: 100%;
						margin-bottom: 3px;
						outline: none;
					}
					form img {
						width: 100%;
						height: 300px;
					}

					.submit {
						background-color: orange;
						color: black;
						outline: none;
						border: none;
						margin-top: 5px;
					}
				</style>
			</head>
			<body>
				<form action="product_add.php" method="post">
					<h3>Add Product</h3>
					<select>
						<option>Vovo</option>
						<option>Vovo</option>						
					</select>
					<input type="text" name="name"><br/>
					<input type="text" name="price"><br/>
					<input type="file" name="image"><br/>
					<img src="" alt="preview image"><br/>
					<input class="submit" type="submit" name="submit" value="Add Product">
				</form>

			</body>
			</html>

	 	<?php
	 } else {
	 	header ('Login: login.php');
	 }

	 mysqli_close($con);

?>

