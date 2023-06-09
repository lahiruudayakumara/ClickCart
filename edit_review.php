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
//UI wrote
  if(isset($_POST['submit'])){
    
        $title = $_POST['title'];
        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $description = $_POST['description'];
        $description  = filter_var($description, FILTER_SANITIZE_STRING);
        $ratings = $_POST['rating'];
        $ratings = filter_var($rating, FILTER_SANITIZE_STRING);
  
        $update_review = $conn->prepare("UPDATE 'reviews' SET rating = ?, title = ?, description =? WHERE id = ? ");
        $update_review->execute([$rating, $title,$description,$get_id]);
  
        $success_msg[] = 'Review Updated';

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

   <!-- update review section starts -->
<section class="account-form">
<?php  
$select_review = $conn->prepare("SELECT * FROM 'rating' WHERE id=? LIMIT 1");
$select_review->execute([$get_id]);
if($select_review->rowCount() > 0){
  while($fetch_review = $select_review-> fetch(PDO::FETCH FETCH_ASSOC))

?>
<form action = "" method ="POST">
   	<h3>edit Your Review </h3>
   	<p class ="placeholder"> review title <span>*</span> </p>
   	<input type ="text" name="title" required maxlength="50" placehoder="enter review title" class="box" value="<?= $fetch_review['title'];?>">
   	<p class="placeholder">review description</p>
	<textarea name ="description" class="box" placeholder="enter description" maxlength="1000" cols="30" rows="10"><?= $fetch_review['description'];?></textarea>
   	<p class="placeholder">review rating<span>*</span></p>
   	<select name="rating"  class="box" required> 
	   <option value="<?= $fetch_review['rating'];?>"><?= $fetch_review['rating'];?></option>
	   <option value="1">1</option>
     <option value="2">2</option>
	   <option value="3">3</option>
	   <option value="4">4</option>
	   <option value="5">5</option>
   	</select>
	<input type="submit" value="update review" name="submit" class="btn">
	<a href ="store.php?get_id=<?= $fetch_review['post_id']; ?>"  clas="option-btn">go back</a>
<!--    -->
</form>
<?php 
}else{
  echo '<p.class = "empty">somthing.went.wrong!</p>';
} ?>
</section>
   <!-- update review section starts -->

    <!-- Footer -->
    <?php include './footer.php' ?>

</body>

</html>
<?php
	$con->close();

?>