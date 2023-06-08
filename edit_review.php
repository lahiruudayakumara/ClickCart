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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $rating = $_POST["rating"];
  $review = $_POST["review"];

  $stmt = $conn->prepare("UPDATE reviews SET name=?, email=?, rating=?, review=? WHERE id=?");
  $stmt->bind_param("ssisi", $name, $email, $rating, $review, $id);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  header("Location: review_page.php");
  exit;
} else {
  $id = $_GET["id"];

  $stmt = $conn->prepare("SELECT * FROM reviews WHERE id=?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  
  $name = $row["name"];
  $email = $row["email"];
  $rating = $row["rating"];
  $review = $row["review"];

  $stmt->close();
  $conn->close();
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
  <h1>Edit Review</h1>

  <form action="edit_review.php" method="POSTt">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

    <label for="rating">Rating:</label>
    <select id="rating" name="rating" required>
      <option value="5" <?php if ($rating == 5) echo "selected"; ?>>5 Stars</option>
      <option value="4" <?php if ($rating == 4) echo "selected"; ?>>4 Stars</option>
      <option value="3" <?php if ($rating == 3) echo "selected"; ?>>3 Stars</option>
      <option value="2" <?php if ($rating == 2) echo "selected"; ?>>2 Stars</option>
      <option value="1" <?php if ($rating == 1) echo "selected"; ?>>1 Star</option>
    </select>

    <label for="review">Review:</label>
    <textarea id="review" name="review" required><?php echo htmlspecialchars($review); ?></textarea>

    <input type="submit" value="Save Changes">
  </form>
  
<!-- Footer -->
<?php include './footer.php' ?>

</body>

</html>
<?php
	$con->close();
?>