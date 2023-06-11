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
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reviews</title>
    <link rel="stylesheet" href="./css/myreviews.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/index.css">

</head>
<body>
<?php include "./header.php" ?>

<?php 
include_once("conn.php"); //connection establishement 
$bID = $_SESSION['buyer_ID'];
$query = "SELECT * FROM rating where buyer_ID = '$bID' ";
$result = $con->query($query);
?>

<div class ="review">
    
              <div class="card-heading">
                <div class="card-inside">
                    <p> Product ID</p>
                    <p> Product Name</p>
                    <p> Rating Count</p>
                    <p> Comment</p>   
                    <div>Edit Action</div>
                    <div>Delete Action</div>
              </div>
 </div> 


<div class ="review">
        <?php 
        while($row = mysqli_fetch_assoc($result))

        { ?>
              <div class="card">
                <div class="card-inside">
    <p><?php echo $row["product_ID"]; ?></p>

    <?php
    $productID = $row["product_ID"];
    $sqlone = "SELECT product_Name FROM product WHERE product_ID = $productID";
    $result_one = mysqli_query($con, $sqlone);
    $product = mysqli_fetch_assoc($result_one);
    $productName = $product["product_Name"];
    ?>
    <p><?php echo $productName; ?></p>
    <p><?php echo $row["stars"]; ?></p>
    <p><?php echo $row["comment"]; ?></p>
    <div><a href="edit_review.php?id=<?php echo $row['rating_ID']; ?>" class="btn">Edit Review</a></div>
    <div><a href="delete_review.php?id=<?php echo $row['rating_ID']; ?>" class="btn">Delete Review</a></div>
</div>

              </div>
              </div>
 </div> 
              <?php   } ?>
              




</body>
</html>