<?php
	require './conn.php';

	session_start();

	if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'buyer') {

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
			
			header("Location: seller_dashboard.php"); // Redirect to seller dashboard page
			exit();
			
		} else if($rowCount2 == 1) {

			$row = $result2->fetch_assoc();

			$buyerID = $row['buyer_ID'];

			$_SESSION['user_role'] = 'buyer';
			$_SESSION['buyer_ID'] = $buyerID;

			header("Location: index.php"); // Redirect to home page
			exit();
		} else {
			$error = "invalid email or password!";
		}
	} 

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Review</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/review_page.css"> 
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body> 

    <!-- Header -->
<?php include './header.php'; ?>


<?php 
$bID = $_SESSION['buyer_ID'];
?>

<?php

include_once("conn.php");
$id = $_GET['id'];


if(isset($_POST["Submit"]))
    {
    	//post all value
    	$comment = $_POST['comment'];
		$stars = $_POST['stars'];
        $id = $_GET['id']; //product ID from store page
    	$query = "INSERT INTO rating (rating_ID, seller_ID, buyer_ID,  product_ID, stars, comment) VALUES ('', '1', '{$bID}', '{$id}', '{$stars}', '{$comment}')";
		$result = $con->query($query);
		if($result) {
			echo "<script>alert('Review Added'); window.location = 'myreviews.php';</script>";
		} else {
			echo "<script>alert('Review Added'); window.location = 'store.php';</script>";
		}

    }

?>

<!-- Add review section Start -->

<div class="add-review-box">
    <h3>Add Review</h3>
        <form action ="" method="post" name="form1" >
          	<div id="" class="form-group">
				<label>Stars rating<span>*</span></label>
				<input type="text" name="stars" class="form-control" placeholder="Enter Stars Count" required> 	 
   			   
		    </div>
		    <div class="form-group">

				<label>Comment</label>
				<input type="text" name="comment" class="form-control" placeholder="Enter comment" maxlength="1000" cols="30" rows="10" required> 
      
          	</div>
            	<input type="submit" name="Submit" value="Submit" class="button1">

			<closeform></closeform>
        </form>
</div> 

<!-- Add review section ends -->

  <!-- Footer -->
  <?php include './footer.php' ?>

</body>
</html>

<?php
} else {
    header('Location: login.php');
    exit();
}
	$con->close();
?>
<!--reference: W3Schools-->