<?php

session_start();

include './conn.php';

if ($_SESSION['user_role'] == 'buyer') { 


		$id = $_GET['id'];

		$query2 = "DELETE FROM rating WHERE rating_id = '$id'  LIMIT 1";

		$result_set = $con->query($query2);

		if ($result_set) {
			echo  '<script>alert("Your Review is Deleted"); window.location = "store.php"; </script>';
		} else {
		   echo  '<script>alert("Review Delete Fail"); window.location = "store.php"; </script>';
		}
} else {
	header('Location : store.php');
	exit();
}

$con->close();
?>