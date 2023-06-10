<?php 
	require './conn.php'; 
	$bid = $_GET['id'];
	
	if(isset($_POST['update'])) {
	
			$bfname = $_POST['fname'];
			$blname = $_POST['lname'];
			$bbday = $_POST['bday'];
			$baddress = $_POST['address'];
			

		$query = "UPDATE buyer SET fName = '$bfname', lName = '$blname', address = '$baddress', birtday = '$baddress''  WHERE buyer_ID = '$bid'";
		if($con->query($query)) {
			echo "<script>alert('Update Sucessfull'); window.location = 'buyer_account_manage.php'</script>";
		} else {
			echo "<script>alert('Error updating record:');</script>";
		}
	}
?>
<?php $con->close(); ?>