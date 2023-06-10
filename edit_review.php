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
<?php
// including the database connection file
include_once("conn.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $stars=$_POST['stars'];
    $comment=$_POST['comment'];  
    
    
        $result = mysqli_query($con, "UPDATE rating SET stars='$stars', comment='$comment'WHERE rating_ID=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: myreviews.php");
    
}
?>
<?php
//error_reporting(0);
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM rating WHERE rating_ID=$id");
 
while($row = mysqli_fetch_array($result))
{

    $stars = $row['stars'];
    $comment = $row['comment'];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/header.css">
	<link rel="stylesheet" href="./css/review_page.css">
	<link rel="stylesheet" href="./css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- Header -->
	<?php include './header.php'; ?>

   <!-- update review section starts -->
    
   <div class="container" style="width: 800px; margin-top: 100px;">
		<div class="row">
    			<h3>Edit Review Page</h3>
   
				<div class="col-sm-6"> 
	
				<form  method="post" name="form1">
					<div class="form-group">
				
						<input type="hidden" name="rating" class="form-control" value="<?php echo $id;?>">
			
					</div>
					<div class="form-group">
						<label>Stars</label>
						<input type="text" name="stars" class="form-control" value="<?php echo $stars;?>">
			
					</div>
			   		<div class="form-group">
						<label>Comment</label>
						<input type="text" name="comment" class="form-control" value=" <?php echo $comment; ?>">
					</div>
						<input type="submit"  value="Update Review" class="btn btn-primary btn-block" name="update">
			
		
				</form>

				</div>
		</div>
	</div>
  
   
<!-- update review section end -->

  <!-- Footer -->
  <?php include './footer.php' ?>
</body>

</html>

<?php
	$con->close();
?>