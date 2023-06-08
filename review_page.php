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
  
  <h1>Product Review</h1>

  <form action="create_review.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="rating">Rating:</label>
    <select id="rating" name="rating" required>
      <option value="5">5 Stars</option>
      <option value="4">4 Stars</option>
      <option value="3">3 Stars</option>
      <option value="2">2 Stars</option>
      <option value="1">1 Star</option>
    </select>

    <label for="review">Review:</label>
    <textarea id="review" name="review" required></textarea>

    <input type="submit" value="Submit Review">
  </form>

  <h2>Reviews</h2>

  <table>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Rating</th>
      <th>Review</th>
      <th>Action</th>
    </tr>
    <?php include 'display_reviews.php'; ?>
  </table>

    <!-- Footer -->
    <?php include './footer.php' ?>

</body>

</html>
<?php
	$con->close();
?>