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
 <!--<?php
// Start session
session_start();

// Check do the person logged in
if($_SESSION['buyer_ID']==NULL){
    // Haven't log in
    echo "You haven't log in";
}else{
    // Logged in
    echo "Successfully Logged in";
    $_SESSION['user_role'] = 'buyer';
    $_SESSION['buyer_ID'] = $buyerID;
    
}


?> -->

<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store page</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/store.css"> 
    <link rel="stylesheet" href="./css/index.css">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
 
    
</head>

<body> 

    <!-- Header -->
<?php include './header.php'; ?>


<?php 
include_once("conn.php"); //connection establishement 

$query = "SELECT * FROM product";
$sellerquery = "SELECT p.*, s.seller_Name FROM seller s JOIN product p ON s.seller_ID = p.seller_ID ";
$result = mysqli_query($con,$sellerquery);

while($row = mysqli_fetch_assoc($result))

{
?>

<header>
        <div class="logo-container">
        <img class="storelogo" src="./images/store/"alt="Store Logo">
            <h1>Nano Tech</h1>
        </div>
</header>
<!-- store page navigation -->
<nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="store_details.php">Store Details</a></li>
        </ul>
</nav>

<!-- Product card -->
<div class="obj-container">


              <div class="image-style">
                    <img class="img-style" src="./images/product/<?php echo $row["product_Image"]; ?>" alt="Cameras">
                    <p><?php echo $row["product_Name"]; ?></p>
                    <p><?php echo $row["seller_Name"]; ?></p>
                    <p>$<?php echo $row["product_Price"];?></p>   
                    <div><a href="product_view_page.php" class="button">View Product</a></div>
                    <div><a href="add_to_cart.php" class="button">Add to cart</a></div>
                    <div><a href="addreview.php?id=<?php echo $row['product_ID']; ?>" class="button">Add Review</a></div>
              </div> 
              <div>
                    <?php

                        $id = $row["product_ID"];
                        $queryone = "SELECT * FROM rating WHERE product_ID = $id";
                        $resultone = mysqli_query($con,$queryone);
                        while($row = mysqli_fetch_assoc($resultone))

                        {
        
                    ?>
                        <p><?php echo $row["stars"]; ?></p>
                        <p><?php echo $row["comment"]; ?></p>

                    <?php  } ?>
              </div>
              
</div>


<?php   } ?>

    <!-- Footer -->
    <?php include './footer.php' ?>

</body>

</html>
<?php
	$con->close();
?>