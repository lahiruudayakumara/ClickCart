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

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $id = $_GET["id"];

  $stmt = $conn->prepare("DELETE FROM reviews WHERE id=?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  header("Location: review_page.php");
  exit;
}
?>
