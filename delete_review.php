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
