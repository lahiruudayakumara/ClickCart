<?php

	session_start();

	require './conn.php';


	if ($_SESSION['user_role'] == "seller" ) { 


?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Click Cart</title>
	    <link rel="stylesheet" href="./css/sellerDashboard.css">
	    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	    
	</head>
	<body>

	    <header id="seller_header">
	        <nav class="seller_nav">
		        <div class="logo">
		            <a href="#">
		                <img src="./images/logo.png" alt="place-holder"/>
		            </a>
		        </div>
	            <ul>
					<li class="li"><a href="#">My Business</a></li>
					<li class="li"><a href="./helpcenter.php">Help Center</a></li>
					<li class="li"><a href="#">Contact Us</a></li>
	            	<li class="li-dropdown">
						Seller
						<ul id="child-ul" class="child-ul" > 
							<li ><a href="./seller_account_manage.php">Manage Account</a></li>
							<li><a href="./logout.php">Logout</a></li>
						</ul>
					</li>
	            </ul>
				<label>
    				<i class="fa fa-bars"></i>
  				</label>
	        </nav>
	    </header> 
	    <?php
	    $category = "SELECT * FORM category";
	    $cat = mysqli_query($con, $category);
	    ?>

		<div id="add-product" class="add-product">
	    	<h2>Add Product</h2>
			<form method="POST" action="product_add.php" enctype="multipart/form-data">
				<select name="category" id="category">
					<?php 
						$query1 = "SELECT * FROM category";
						$result1 = $con->query($query1);

						if($result1) {
							while ($row = $result1->fetch_assoc()) {

								echo '<option value="'. $row['category_ID'] . '">' . $row['category_Name'] . '</option>';

							}
						}
					?>
				</select>
					<input type="text" name="name"><br/>
					<input type="text" name="price"><br/>
					<input type="file" name="image"><br/>
				<input class="submit" name="submit"  type="submit" value="Submit">
				<button class="cancel" type="button"  onclick="hidePopup()">Cancel</button>
			</form>
		</div>


		<div id="edit-product" class="edit-product">
	    	<h2>Add Product</h2>
	    	<form method="POST" action="product_add.php">
				<select name="category" id="category">
					<?php 
						$query = "SELECT * FROM category";
						$result = $con->query($query);

						if($result1) {
							while ($row = $result1->fetch_assoc()) {

								echo '<option value="'. $row['category_ID'] . '">' . $row['category_Name'] . '</option>';

							}
						}
					?>
				</select>
				<input type="text" name="name"><br/>
				<input type="text" name="price"><br/>
				<input type="file" name="image"><br/>
	    		<input class="submit"  type="submit" value="Submit">
	    		<button class="cancel" type="button"  onclick="hidePopup()">Cancel</button>
	    	</form>
	  	</div>


	    <div class="main_section">
	    	<div class="sideBar">
	    		<div style="margin-bottom: 10px;">
	    			<div style="display:flex; align-items: center; margin-bottom: 10px;">
		    			<div class="avatar_s">
			    			<img src="./images/avatar.jpg" alt="avatar">
			    		</div>
			    		<div style="position: relative; left: 10%;">
					    <?php 
					        $sellerID = $_SESSION["seller_ID"];

							$query3 ="SELECT * FROM seller where seller_ID =  $sellerID ";
							$result3 = $con->query($query3);

							if ($result3) {
								
								$row = $result3->fetch_assoc();
								$sID = $row['seller_ID'];
								$sName =  $row['seller_Name'];
								echo "<h3>" . $sName . "</h3>";
							}

					    	$stars = array(1, 2, 3, 4, 5);
					    	$count = array();
					    	$total = 0;
					    		
					    	foreach ($stars as $star) {
					    			$query4 = "SELECT * FROM rating WHERE seller_ID = $sID AND stars = $star";
					    			$result4 = $con->query($query4);

					    			$count[$star] = $result4->num_rows;
					    			$total += 	$count[$star];			    			
					    		}
								
								$calstar = (1 * $count[1] + 2 * $count[2] + 3 * $count[3] + 4 * $count[4] + 5 * $count[5]);

								if($calstar == 0) {
									$rate = 0;
								} else {
									$rate = $calstar / $total;
								}
					    ?>
							<span id="stars" class="<?php if($rate >= 1) {echo "fa fa-star checked";} else if (0 < $rate and $rate < 1) {echo "fa fa-star-half-alt";} else {echo "far fa-star";} ?>"></span>
							<span id="stars" class="<?php if($rate >= 2) {echo "fa fa-star checked";} else if (1 < $rate and $rate < 2) {echo "fa fa-star-half-alt";} else {echo "far fa-star";} ?>"></span>
							<span id="stars" class="<?php if($rate >= 3) {echo "fa fa-star checked";} else if (2 < $rate and $rate < 3) {echo "fa fa-star-half-alt";} ?>"></span>
							<span id="stars" class="<?php if($rate >= 4) {echo "fa fa-star checked";} else if (3 < $rate and $rate < 4) {echo "fa fa-star-half-alt";} else {echo "far fa-star";}?>"></span>
							<span id="stars" class="<?php if($rate >= 5) {echo "fa fa-star checked";} else if (4 < $rate and $rate < 5) {echo "fa fa-star-half-alt";} else {echo "far fa-star";}?>"></span>
							<?php echo $rate; ?> 
			    		</div>
	    			</div>

		    		<hr/>

		    		<?php
		    			$types = array("pending", "complete", "cancel");
		    			$order_Counts = array();

		    			foreach ($types as $type){

			    			$query5 = "SELECT * FROM order_items WHERE seller_ID = $sellerID AND  order_Type = '$type'";
			    			$result5 = $con->query($query5);
			    			$order_Counts[] = $result5->num_rows;

		    			}

		    			$query_p_o_count = "SELECT * FROM order_items WHERE seller_ID = $sellerID AND  order_Type = 'pending' ";
		    			$query_p_o_count_result = mysqli_query($con, $query_p_o_count);
		    			$query_p_o_row = mysqli_num_rows($query_p_o_count_result);
		    		?>

		    		<div>
		    			<p>Pending Order <span style="float: right;"><?php echo $order_Counts[0]; ?></span></p>
		    			<p>Complete Order <span style="float: right;"><?php echo $order_Counts[1]; ?></span></p>
		    			<p>Cancle Order <span style="float: right;"><?php echo $order_Counts[2]; ?></span></p>
		    			<hr/>
		    			<p>Earn in Month <span style="float: right;">$<?php echo"need" ?></span></p>
		    		</div>
		    	</div>
		    	<hr>

	    	</div> 

	    	<div class="mainContent">
				<div class="btn-area">
    				<button placeholder="Add New" onclick="showPopup()">Add New</button>
				</div>

	    		<div class="mainProduct">
		    		<?php 

						$query6 =  "SELECT product.*, category.*
									FROM product
									JOIN category ON product.category_ID = category.category_ID
								  	WHERE product.seller_ID = $sellerID
									";

						$result6 = $con->query($query6);

						if ($result6) {
							
							while ($row = $result6->fetch_assoc()) {

					?>
		    			<div class="sProduct">
		    				<img src="./images/<?php echo $row['product_Image']; ?>" alt="product_image">
		    				<p><?php echo$row['category_Name'] . "<br/>" . $row['product_Name']; ?></p>
		    				<div class="sProductCont">
		    					<p>$<?php echo $row['product_Price']; ?></p>
		    					<div class="clickIcon">
		    						<i id="toggoleicon<?php echo $row['product_ID']; ?>"  class="fa-solid fa-bars" onclick="clickbtn(<?php echo $row['product_ID']; ?>)"></i>
			    					<div id="clickBtn<?php echo $row['product_ID']; ?>" class="clickBtn">
			    						<a href="product_edit.php?id=<?php echo $row['product_ID']; ?>">Edit Product</a><br/>
			    						<a href="product_delete.php?id=<?php echo $row['product_ID']; ?>">Delete Product</a>
			    					</div>
		    					</div>
		    				</div>
		    			</div>	
						<?php
								}	
							}
		                ?>   	    			
	    		</div>
	    	</div>
	    </div>

	    <div class="bottomBar">

	   		<div class="bottomCont">
		    	<div class="head" >
		    		<p class="inline" >Pending Oder List</p>
		    		<a class="a_inline_right" href="#">View All</a>
		    	</div>
		    	<div class="border_bottom">
		    		<p class="inline">Product Name</p><p class="p_right">Buyer Name (Q.)</p>
		    	</div>
		    	<?php
		    		$query7 =  "SELECT order_items.*, seller.*, buyer.*, product.*
		    					FROM order_items 
		    					JOIN seller ON order_items.seller_ID = seller.seller_ID
		    					JOIN buyer ON order_items.buyer_ID = buyer.buyer_ID
		    					JOIN product ON order_items.product_ID = product.product_ID
		    					WHERE order_items.order_Type = 'pending' AND order_items.seller_ID = $sellerID
		    					";

		    		$result7 = $con->query($query7);

		    		if($result7) {

		    			while($row = $result7->fetch_assoc()) {
		    				?>
			    			<p class="inline"><?php echo $row['product_Name']; ?></p>
							<p class="p_right"><?php echo $row['fName'] . "&nbsp; &nbsp;" . $row['quantity'] . "&nbsp &nbsp"; ?></p>
		    				<?php
		    			}
		    		}
		    	?>
	   		</div>

	   		<div class="bottomCont">
		    	<div class="head" >
		    		<p class="inline" >Complete Oder List</p>
		    		<a class="a_inline_right" href="#">View All</a>
		    	</div>
		    	<div class="border_bottom">
		    		<p class="inline">Product Name</p><p class="p_right">Buyer Name (Q.)</p>
		    	</div>
		    	<?php
		    		$query8 = "  SELECT order_items.*, seller.*, buyer.*, product.*
		    							FROM order_items 
		    							JOIN seller ON order_items.seller_ID = seller.seller_ID
		    							JOIN buyer ON order_items.buyer_ID = buyer.buyer_ID
		    							JOIN product ON order_items.product_ID = product.product_ID
		    							WHERE order_items.order_Type = 'complete' AND order_items.seller_ID = $sellerID
		    							";
		    		$result8 = $con->query($query8);

		    		if($result8) {

		    			while($row = $result8->fetch_assoc()) {
		    				?>
			    			<p class="inline"><?php echo $row['product_Name']; ?></p>
							<p class="p_right"><?php echo $row['fName'] . "&nbsp; &nbsp;" . $row['quantity'] . "&nbsp &nbsp"; ?></p><br/>
		    				<?php
		    			}
		    		}
		    	?>
	   		</div>

	   		<div class="bottomCont">
		    	<div class="head" >
		    		<p class="inline" >Cancel Oder List</p>
		    		<a class="a_inline_right" href="#">View All</a>
		    	</div>
		    	<div class="border_bottom">
		    		<p class="inline">Product Name</p><p class="p_right">Buyer Name (Q.)</p>
		    	</div>
		    	<?php
		    		$query9 = "  SELECT order_items.*, seller.*, buyer.*, product.*
		    							FROM order_items 
		    							JOIN seller ON order_items.seller_ID = seller.seller_ID
		    							JOIN buyer ON order_items.buyer_ID = buyer.buyer_ID
		    							JOIN product ON order_items.product_ID = product.product_ID
		    							WHERE order_items.order_Type = 'cancel' AND order_items.seller_ID = $sellerID
		    							";
		    		$result9 = $con->query($query9);

		    		if($result9) {

		    			while($row = $result9->fetch_assoc()) {
		    				?>
			    			<p class="inline"><?php echo $row['product_Name'];?></p>
							<p class="p_right"><?php echo$row['fName'] . "&nbsp; &nbsp;" . $row['quantity'] . "&nbsp &nbsp"; ?></p>
		    				<?php
		    			}
		    		}
		    	?>
	   		</div>

	    </div>
	    <br/>

		<?php include'./footer.php' ?>
	    <!-- js files -->
	    <script type="text/javascript" src="./js/check_online.js"></script>
	    <script type="text/javascript" src="./js/sellerDashboard.js"></script>

	</body>
	</html>
<?php
	} else {
		header("Location: login.php");
	}
	$con->close();
?>