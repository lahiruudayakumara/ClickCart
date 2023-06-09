<!-- add login verifycation here -->
<?php
	require './conn.php';

	session_start();

	if(isset($_POST['submit']) && $_POST['email'] && $_POST['password']) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "SELECT * FROM seller WHERE email = '$email' AND password = '$password'";
		$result = $con->query($query);
		$rowCount = $result->num_rows;

		$query2 = "SELECT * FROM buyer WHERE email = '$email' AND password = '$password'";
		$result2 = $con->query($query2);
		$rowCount2 = $result2->num_rows;

		if($rowCount == 1) {
			$row = $result->fetch_assoc();

			$sellerID = $row['seller_ID'];

			$_SESSION['user_role'] = 'seller';
			$_SESSION['seller_ID'] = $sellerID;
			
			$sellerID = $row['seller_ID'];

			echo "<script>alert('$rowCount')</script>";

			$_SESSION['user_role'] = 'seller';
			$_SESSION['seller_ID'] = $sellerID;
			header("Location: seller_dashboard.php"); // Redirect to seller dashboard page
			exit();
			
		} else if($rowCount2 == 1) {

			$row = $result2->fetch_assoc();

			$sellerID = $row['buyer_ID'];

			$_SESSION['user_role'] = 'buyer';
			$_SESSION['buyer_ID'] = $buyerID;
			
			$sellerID = $row['buyer_ID'];

			$_SESSION['user_role'] = 'seller';
			$_SESSION['seller_ID'] = $sellerID;
			header("Location: index.php"); // Redirect to seller dashboard page
			exit();
		} else {
			$error = "invalid email or password!";
		}
	} 
//UI wtrote
if(isset($_POST['submit'])){
	if($user_id != '')
	{
			$id = create_unique_id();
			$title = $_POST['title'];
			$title = filter_var($title, FILTER_SANITIZE_STRING);
			$description = $_POST['description'];
			$description  = filter_var($title, FILTER_SANITIZE_STRING);
			$ratings = $_POST['rating'];
			$ratings = filter_var($title, FILTER_SANITIZE_STRING);

				$verify_review = $conn->prepare ("SELECT * FROM 'rating' WHERE rating_id = ? AND buyer_id = ?");
				$verify_review->execute([$get_id, $user_id]);

			if($verify_review->rowCount() > 0){
				$warning_msg[] = 'Your review already added ';
			}else{
				$add_review = $conn->prepare("INSERT INTO 'reviews'(rating_id,seller_id,product_id,stars) VALUES(?,?,?,?) ");
				$add_review->execute([$rating_id, $get_id,$product_id,$stars]);
				$success_msg[] = 'Review added';
			}
}else
	{
			$warning_msg[]='Please login first!!';
	}
	

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/header.css">
	<link rel="stylesheet" href="./css/review_page.css">
	<link rel="stylesheet" href="./css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <!-- Header -->
	<?php include './header.php'; ?>

	<!-- Add review section Start -->
<section class = "account-form">

<form action = "" method ="POST">
   	<h3>Post Your Review </h3>
   	<p class ="placeholder"> review title <span>*</span> </p>
   	<input type ="text" name="title" required maxlength="50" placehoder="enter review title" class="box">
   	<p class="placeholder">review description</p>
	<textarea name ="description" class="box" placeholder="enter description" maxlength="1000" cols="30" rows="10"></textarea>
   	<p class="placeholder">review rating<span>*</span></p>
   	<select name="rating"  class="box" required> 
	   <option value="1">1</option>
	   <option value="2">2</option>
	   <option value="3">3</option>
	   <option value="4">4</option>
	   <option value="5">5</option>
   	</select>
	<input type="submit" value="submit review" name="submit" class="btn">
	<a href ="store.php?get_id=<?= $get_id; ?>"  clas="option-btn">go back</a>
<!--    -->
</form>

</section>
   <!-- Add review section ends -->
    <!-- Footer -->
    <?php include './footer.php' ?>

</body>

</html>
<?php
	$con->close();
?>

