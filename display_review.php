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
		<title>Review page</title>
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
	
		<!-- review section Start -->
	<section class ="review-container">
		<div class="heading"> <h1> user's reviews </h1> <a href="display_review.php? get_id=<?= $get_id; ?>" class="inline-btn" style="margin-top: 0;"> add review</a> </div>

		<div class="box-container">
			<?php 
			$select_reviews = $conn->prepare("SELECT * FROM 'rating' WHERE rating_id = ?");
			$select_reviews->execute([$get_id]);
			
			if($select_reviews->rowCount() > 0)
			{
				while($fetch_review = $select_reviews-> fetch(POD::FETCH_ASSOC)){
			?>
				<div class = "box"  <?php if($fetch_review['user_id']== $user_id){
					echo'style ="order": -1;"';};?>>
				
				<?php
					$select_user = $conn->prepare("SELECT * FROM 'users' WHERE id = ? ");
					$select_user->execute([$fetch_review['user_id']]);
						while($fetch_user= $select_user-> fetch(PDO::FETCH_ASSOC)){
				?>
<div class ="user">
	<?php if($fetch_user['image'] !=''){ ?>
		<img src ="uploaded_files/<?= $fetch_user['image']; ?>" alt=" ">
	<?php }else{ ?>
		<h3> <?= substr($fetch_user['name'],0,1) ?></h3>
	<?php }; ?>
	<div>
		<p> <?= $fetch_user['name']; ?> </p>
		<span><?= $fetch_review['date']; ?> </span>
	</div>
	</div>
	<?php };  ?>
	<div class= "ratings">
		<?php if($fetch_review['rating'] == 1){ ?>
			<p style="background:var(--red);" ><i class="fas fa-star"></i>
			<span> <?= $fetch_review['rating']; ?> </span></p>
		<?php }; ?> 
		<?php if($fetch_review['rating'] == 2){ ?>
			<p style="background:var(--orange);" ><i class="fas fa-star"></i>
			<span> <?= $fetch_review['rating']; ?> </span></p>
		<?php }; ?> 
		<?php if($fetch_review['rating'] == 3){ ?>
			<p style="background:var(--red);" ><i class="fas fa-star"></i>
			<span> <?= $fetch_review['rating']; ?> </span></p>
		<?php }; ?> 
		<?php if($fetch_review['rating'] == 4){ ?>
			<p style="background:var(--main-color);" ><i class="fas fa-star"></i>
			<span> <?= $fetch_review['rating']; ?> </span></p>
		<?php }; ?>
		<?php if($fetch_review['rating'] == 5){ ?>
			<p style="background:var(--main-color);" ><i class="fas fa-star"></i>
			<span> <?= $fetch_review['rating']; ?> </span></p>
		<?php }; ?>
	</div>
		<h3 class="title"> <? fetch_review['title'] ?> </h3>
		<?php if($fetch_review['description']!=  ''){ ?>
			<p class="description"> <?= $fetch_review['description']; ?> </p>
		<?php }; ?>
		<?php if($fetch_review['user_id'] == $user_id){	?>
			<form action ="" method= "POST" class ="felx-btn">
				<input type ="hidden" name="delete_id" value="<?= $fetch_review['id']; ?>">
				<a href="edit_review.php?get_id= <$fetch_review['id']; ?>"
				class ="inline-option-btn">edit review</a>
				<input type="submit" value="delete review" class ="inline-delete-btn" name="delete_review">
			</form>
		<?php }; ?>
	</div>
	<?php	
	}
	}else{
		echo'<p.class ="empty">no.reviews.added.yet!</p>';

	}
?>

		<!-- Footer -->
		<?php include './footer.php' ?>
	
	</body>
	
	</html>
	<?php
		$con->close();
	?>
	s
	