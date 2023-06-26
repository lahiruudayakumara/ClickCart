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
		<link href="./images/ico.png" rel="icon" type="image/png" />
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
				<div id="icon">
					<a href="#" onclick="navShow()"><i id="toggleicon" class="fa fa-bars"></i></a>
				</div>
	            <ul id="ul">
					<li id="li" class="li"><a href="./helpcenter.php">Help Center</a></li>
					<li id="li" class="li"><a href="./contactus.php">Contact Us</a></li>
					<li id="li" class="li"><a href="./seller_account_manage.php">Manage Account</a></li>
					<li id="li" class="li"><a href="./logout.php">Logout</a></li>
	            </ul>
	        </nav>
	    </header> 

		<!-- popup window-->
		<div id="add-product" class="add-product">
	    	<h2>Add Product</h2>
			<form method="POST" action="product_add.php" enctype="multipart/form-data">
				<select name="category" id="category">
					<?php 
						$query1 = "SELECT * FROM category";
						$result1 = $con->query($query1);

						if($result1) {
							while ($row = $result1->fetch_assoc()) {
								?>

								<option value="<?php echo $row['category_ID']; ?>"><?php echo $row['category_Name']; ?></option>

								<?php
							}
						}
					?>
				</select>
					<input type="text" name="name" placeholder="Product Name" required/><br/>
					<input type="text" name="brand" placeholder="Brand Name" required/><br/>
					<textarea rows="4" name="Description" placeholder="Discription"></textarea>
					<input type="text" name="price" placeholder="Price" required/><br/>
					<input id="image" type="file" name="image" onchange="preview()" required/>
					<img id="img" src="#">
				<input class="submit" name="submit"  type="submit" value="Submit"/>
				<button class="cancel" type="button"  onclick="hidePopup()">Cancel</button>
			</form>
		</div>
		<!-- close popup window-->

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
							<span id="stars" class="<?php if($rate >= 3) {echo "fa fa-star checked";} else if (2 < $rate and $rate < 3) {echo "fa fa-star-half-alt";} else {echo "far fa-star";} ?>"></span>
							<span id="stars" class="<?php if($rate >= 4) {echo "fa fa-star checked";} else if (3 < $rate and $rate < 4) {echo "fa fa-star-half-alt";} else {echo "far fa-star";}?>"></span>
							<span id="stars" class="<?php if($rate >= 5) {echo "fa fa-star checked";} else if (4 < $rate and $rate < 5) {echo "fa fa-star-half-alt";} else {echo "far fa-star";}?>"></span>
							<?php echo $rate; ?> 
			    		</div>
	    			</div>

		    		<hr/>

		    		<?php
		    			$types = array("pending", "complete", "shipment");
		    			$order_Counts = array();

		    			foreach ($types as $type){

			    			$query5 = "SELECT place_order.*, buyer.*, product.*
							FROM  place_order 
							JOIN buyer ON place_order.buyer_ID = buyer.buyer_ID
							JOIN product ON place_order.product_ID = product.product_ID
							WHERE place_order.order_status = '$type' AND product.seller_ID = $sellerID";
			    			$result5 = $con->query($query5);
							if ($result5->num_rows > 0) {
								$order_Counts[] = $result5->num_rows;
							} else {
								$order_Counts[] = 0;
							}
			    			

		    			}

		    		?>

		    		<div>
		    			<p>Pending Order <span style="float: right;"><?php echo $order_Counts[0]; ?></span></p>
		    			<p>Complete Order <span style="float: right;"><?php echo $order_Counts[1]; ?></span></p>
		    			<p>Shipment Order <span style="float: right;"><?php echo $order_Counts[2]; ?></span></p>
		    			<hr/>
						<?php
							$queryEarn = "SELECT place_order.*, product.* 
										FROM place_order
										JOIN product ON place_order.product_ID = product.product_ID
										WHERE product.seller_ID = $sellerID AND  place_order.order_status = 'complete'";
							$resultEarn = $con->query($queryEarn);
							$Earn = 0;
							while($row = $resultEarn->fetch_assoc()) {
								$amount = $row['total_price'];
								$Earn += $amount;
							}
						?>
		    			<p>Your Earn<span style="float: right;">$<?php echo $Earn; ?></span></p>
		    		</div>

					<div class="chat">
		    			<table>
			    			<tr>
			    			<th><p class="inline" style="float:left;">Chat - Inbox Message</p><p class="a_inline_right">View All</p></th>
			    			</tr>
							<?php
								$messages_query = "SELECT message.*, buyer.*
													FROM message
													JOIN buyer ON buyer.buyer_ID = message.buyer_ID
													WHERE message.sender_role = 'buyer' AND message.seller_ID = $sellerID LIMIT 3";

								$messages_result = $con->query($messages_query);

								if($messages_result ) {

									while($row = $messages_result->fetch_assoc()) {
										$message = $row['message'];
										$buyer = $row['fName'];
										$timestamp = $row['timestamp']
										?>
										<tr>
											<td>
												<img style="
												position: absolute;" src="./images/avatar.jpg" alt="avatar" width="40px" height="40px">
												<div style="margin-left: 50px;"> 
												<p class="inline"><?php echo $buyer; ?></p><br/>
												<p class="inline"><?php echo substr($message, 0, 20); ?></p>
												<span style="font-size:12px; margin-right: 5px;"  class="p_right" align="center">
													<?php echo $timestamp ?>
												</span>
											</div>
											</td>
										</tr>
										<?php
									}
								}
							?>
						</table>
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
									ORDER BY product.product_ID
									";

						$result6 = $con->query($query6);

						if ($result6) {
							
							while ($row = $result6->fetch_assoc()) {

					?>
		    			<div class="sProduct">
		    				<img src="./images/product/<?php echo $row['product_Image']; ?>" alt="product_image">
		    				<p><?php echo substr($row['category_Name'],0 ,15) . "<br/>" . substr($row['product_Name'],0,15) . "<br/>" . substr($row['product_Brand'],0,15); ?></p>
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
		    		$query7 =  "SELECT place_order.*, buyer.*, product.*
		    					FROM  place_order 
		    					JOIN buyer ON place_order.buyer_ID = buyer.buyer_ID
		    					JOIN product ON place_order.product_ID = product.product_ID
		    					WHERE place_order.order_status = 'pending' AND product.seller_ID = $sellerID
		    					";

		    		$result7 = $con->query($query7);

		    		if($result7) {
		    			while($row = $result7->fetch_assoc()) {
		    				?>
			    			<p class="inline"><?php echo substr($row['product_Name'], 0, 30); ?></p>
							<p class="p_right"><?php echo $row['fName'] . "&nbsp; &nbsp;" . $row['quantity'] . "&nbsp &nbsp"; ?></p>
							<br/>
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
		    		$query8 = "SELECT place_order.*, buyer.*, product.*
								FROM  place_order 
								JOIN buyer ON place_order.buyer_ID = buyer.buyer_ID
								JOIN product ON place_order.product_ID = product.product_ID
								WHERE place_order.order_status = 'complete' AND product.seller_ID = $sellerID
								";
		    		$result8 = $con->query($query8);

		    		if($result8) {

		    			while($row = $result8->fetch_assoc()) {
		    				?>
			    			<p class="inline"><?php echo substr($row['product_Name'], 0, 30); ?></p>
							<p class="p_right"><?php echo $row['fName'] . "&nbsp; &nbsp;" . $row['quantity'] . "&nbsp &nbsp"; ?></p><br/>
		    				<?php
		    			}
		    		}
		    	?>
	   		</div>

	   		<div class="bottomCont">
		    	<div class="head" >
		    		<p class="inline" >Shipment Oder List</p>
		    		<a class="a_inline_right" href="#">View All</a>
		    	</div>
		    	<div class="border_bottom">
		    		<p class="inline">Product Name</p><p class="p_right">Buyer Name (Q.)</p>
		    	</div>
		    	<?php
		    		$query9 = "SELECT place_order.*, buyer.*, product.*
								FROM  place_order 
								JOIN buyer ON place_order.buyer_ID = buyer.buyer_ID
								JOIN product ON place_order.product_ID = product.product_ID
								WHERE place_order.order_status = 'shipment' AND product.seller_ID = $sellerID
								";
		    		$result9 = $con->query($query9);

		    		if($result9) {

		    			while($row = $result9->fetch_assoc()) {
		    				?>
			    			<p class="inline"><?php echo substr($row['product_Name'], 0, 30); ?></p>
							<p class="p_right"><?php echo$row['fName'] . "&nbsp; &nbsp;" . $row['quantity'] . "&nbsp &nbsp"; ?></p>
		    				<?php
		    			}
		    		}
		    	?>
	   		</div>

	    </div>
	    <br/>

	<?php include'./footer.php' ?>

	<!-- javascript files -->
	<script src="./js/imgPreview.js"></script>
	<script src="./js/check_online.js"></script>
	<script src="./js/sellerDashboard.js"></script>
	<script>
		function navShow() {
			var a  =document.getElementById("ul");
			var b = document.getElementById("toggleicon");

			if(b.className === "fa fa-bars") {
				a.style.display = "block";
				b.className =  "fa fa-close";
			} else {
				a.style.display = "none";
				b.className =  "fa fa-bars";
			}	
			
		}
	</script>

	</body>
	</html>
<?php
	} else {
		header("Location: login.php");
	}

	$con->close();
?>