<?php
	if(isset ($_POST['delete_review'])){
		$delete_id = $_post['delete_id'];
		$delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

		$verify_delete =$conn->prepare("SELECT *FROM'rating' WHERE id = ?");
		$verify_delete->execute([$delete_id]);

		if($verify_delete->rowCount() > 0){
			$delete_review = $conn->prepare("DELETE FROM 'rating' WHERE id =? ");
			$delete_review->execute([$delete_id]);
			$success_msg = 'Review deleted !';
		}else{
			$warning_msg[] = 'Review already deleted!';
		}
	}
?>
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