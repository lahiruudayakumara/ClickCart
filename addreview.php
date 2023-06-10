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
			
			header("Location: seller_dashboard.php"); // Redirect to seller dashboard page
			exit();
			
		} else if($rowCount2 == 1) {

			$row = $result2->fetch_assoc();

			$buyerID = $row['buyer_ID'];

			$_SESSION['user_role'] = 'buyer';
			$_SESSION['buyer_ID'] = $buyerID;

			header("Location: index.php"); // Redirect to seller dashboard page
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
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/review_page.css"> 
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
 
</head>

<body> 

    <!-- Header -->
<?php include './header.php'; ?>


<?php 
$bID = $_SESSION['buyer_ID'];
echo $bID;
?>

<?php

include_once("conn.php");
$id = $_GET['id'];


if(isset($_POST["Submit"]))
    {
    	//post all value
    	extract($_POST);
        $id = $_GET['id']; //product ID from store page
    	$query = "INSERT INTO `rating` (`rating_ID`, `product_ID`, `stars`, `comment`) VALUES (NULL, '".$id."', '".$stars."', '".$comment."')";

    	mysqli_query($con,$query);
    	header("location:store.php"); // if submit was done redirect to the store page
    }

?>

<!-- Add review section Start -->

  <div class="add-review-box">
    <h3>Add Review</h3>
	<?php echo $bID; ?>
        <form action ="addreview.php" method="post" name="form1" >
          <div class="form-group">
				    <label>Stars rating<span>*</span></label>
				    <input type="text" name="stars" class="form-control" placeholder="Enter Stars Count" required> 	 
   			    <!-- <select name="rating"  class="box" required>
						<option value="1">1</option>
	   			        <option value="2">2</option>
	   			        <option value="3">3</option>
	   			        <option value="4">4</option>
	   			        <option value="5">5</option>
   			        </select>-->
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
	$con->close();
?>

