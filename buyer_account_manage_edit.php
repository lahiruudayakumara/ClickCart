<?php 
	require './conn.php'; 
	if(!isset($_SESSION['user_role'] == 'buyer')){
		header('loction:login.php');
	}
    else{if(isset($_REQUEST['submit'])){
		$bfname=$_POST['fname'];
		$blname=$_POST['lname'];
		$bbday=$_POST['bday'];
		$baddress=$_POST['address'];

		if((!empty($bfname))&&(!empty($blname))&&(!empty($bbday))&&(!empty($baddress))){
			$bID=$_SESSION['buyer_ID'];
			$query="UPDATE buyer SET fname='$bfname', lname='$blname', bday='$bbday', address='$baddress' WHERE buyer_ID='$bID'";
			$con->query($query) {
				echo "<script>alert('Profile upadeted sucessfully'); window.location = 'buyer_account_manage_edit.php'</script>";
				exit;
			} 
		}

		else {
			$con->query($query) {
			echo "<script>alert('First name,Last name,Birthday,Address are required );</script>; window.location = 'buyer_account_manage_edit.php'</script>";
			exit;
			}
		}
	}
	}
	


?>
<?php $con->close(); ?>