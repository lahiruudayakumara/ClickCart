<?php
	require './conn.php';

	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "SELECT * FROM seller WHERE email= $email AND password= $password ";
		$result = mysqli_query($con, $query);
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


		} else {
			$error = "Invalid password";
		}
	} else {
		echo "<script>alert('not work');</script>";
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./css/header.css">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body> 

    <!-- Header -->
	<?php include './header.php'; ?>

    <!-- Login form -->
    <div class="login-box">
      <h1>Hello</h1>
		<p class="para-1">    <!-- link to create account page -->
      Sign in to ClickCart or <a href="./create_account.php">create an account</a>
    </p>

		<?php if(isset($error)) { 
			 ?> 
			 <p class= "para-2"> Invalid password !! </p>
			 <?php
			} ?>
        	<form action ="./login.php" method="POST">
            	<input type="email" name="email" placeholder="Email" />
            	<input type="password" name="password" placeholder="Password" />
            <div class="recover"> 
				<a href= '#'> Forgot password? </a>
		    </div>
			<input type="submit" name="submit">

			<!--<button type="submit" name="submit">Login</button>
      		<closeform></closeform>-->
		</form>
    </div>
    

    <!-- Footer -->
    <?php include './footer.php' ?>

</body>

</html>
<?php
	$con->close();
?>