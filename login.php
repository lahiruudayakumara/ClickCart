<?php

	session_start();

	include './conn.php';

	if(isset($_SESSION['seller_login'])) {

		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
		    <meta charset="UTF-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <title>Click Cart</title>
		    <link rel="stylesheet" href="./css/style.css">
		    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		</head>
		<body>
		    <?php include "./header.php" ?>
		    <div style="margin:10px;">
		    	<form>
		    		<input type="text" name="username">
		    		<input type="text" name="password">
		    		<input type="submit" name="submit">
		    	</form>
		    </div>
		    <?php include "./footer.php" ?> 
		</body>
		</html>
		<?php

	} else {

			if (isset($_POST['submit'])) {
			    $email = $_POST['email'];
			    $password = $_POST['password'];

			    $sql = "SELECT * FROM seller WHERE email='$email' AND password='$password'";
			    $result = mysqli_query($con, $sql);
			    $row_count = mysqli_num_rows($result);

			    if ($row_count == 1) {
			        // Fetch the row data
			        $row = mysqli_fetch_assoc($result);

			        // Access specific column values
			        $sellerID = $row['seller_ID'];
			        // ...

			        // Seller login successful
			        $_SESSION['user_role'] = 'seller';
			        $_SESSION['seller_ID'] = $sellerID;
			        header("Location: seller_dashboard.php"); // Redirect to seller dashboard page
			        exit();
			    } 

			    // Query the Buyers table
			    $sql = "SELECT * FROM buyer WHERE email='$username' AND password='$password'";
			    $result = mysqli_query($con, $sql);
			    $row_count = mysqli_num_rows($result);

			    if ($row_count == 1) {
			        // Fetch the row data
			        $row = mysqli_fetch_assoc($result);

			        // Access specific column values
			        $buyerID = $row['buyerID'];
			        $buyerName = $row['buyerName'];
			        // ...

			        // Buyer login successful
			        $_SESSION['user_role'] = 'buyer';
			        $_SESSION['username'] = $username;
			        header("Location: buyer_dashboard.php"); // Redirect to buyer dashboard page
			        exit();
			    }

			    if ($row_count == 1 ) {

			    } else {
			    	$erro = "Invalid username or password";
			    }		    	
			    


			}


/*
		include './conn.php';
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$email = $_POST['email'];
			$password = $_POST['password'];


			if ($email == 'lahiru@gmail.com' AND $password == '1234'){
				//user entered correct details
				$_SESSION['seller_login'] = true;
				setcookie('myData', 'Hello, World!');
				

				header('Location: seller_dashboard.php');
				exit();
			} else {
				// user entered false details
				$error = 'Incorect details';
			}

		}

*/
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
		    <meta charset="UTF-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <title>Click Cart</title>
		    <link rel="stylesheet" href="./css/style.css">
		    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		</head>
		<body>
		    <?php include "./header.php" ?>
		    <div style="margin:10px;">
		    	<form action="login.php" method="post">
		    		<input type="email" name="email">
		    		<input type="password" name="password">
		    		<input type="submit" name="submit">
		    		<?php if(isset($erro)) { ?>
		    		<p style="color: red; "><?php echo $erro; ?></p>
		    		<?php } ?>
		    	</form>
		    </div>
		    <?php include "./footer.php" ?> 

		</body>
		</html>
		<?php

	}
	
	mysqli_close($con);
	

?>