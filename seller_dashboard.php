<?php

	session_start();

	include './conn.php';


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
	            	<li><a href="./logout.php">Log Out</a></li>
	                <li><a href="#">Contact Us</a></li>
	                <li><a href="./helpcenter.php">Help Center</a></li>
	                <li><a href="#">My Business</a></li>

	            </ul>

	        </nav>
	    </header> 

	    <?php
	    $category = "SELECT * FORM category";
	    $cat = mysqli_query($con, $category);
	    ?>

	  <div id="add-product" class="add-product">
	    <h2>Add Product</h2>
	    <form method="POST" action="product_add.php">
					<select>
						<?php 
							$selectCategory = "SELECT * FROM category";
							$ca = mysqli_query($con, $selectCategory);

							if($ca) {
								while ($rowCategory = mysqli_fetch_assoc($ca)) {
									$c_ID =$rowCategory['category_ID'];
									$c_Name =$rowCategory['category_Name'];

									?>
										<option value="<?php echo $c_ID; ?>"><?php echo $c_Name; ?></option>
									<?php
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


	  <div id="edit-product" class="edit-product">
	    <h2>Add Product</h2>
	    <form method="POST" action="product_add.php">
					<select>
						<?php 
							$selectCategory = "SELECT * FROM category";
							$ca = mysqli_query($con, $selectCategory);

							if($ca) {
								while ($rowCategory = mysqli_fetch_assoc($ca)) {
									$c_ID =$rowCategory['category_ID'];
									$c_Name =$rowCategory['category_Name'];

									?>
										<option value="<?php echo $c_ID; ?>"><?php echo $c_Name; ?></option>
									<?php
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

							$query ="SELECT * FROM seller where seller_ID =  $sellerID ";

							$result = mysqli_query($con, $query);

							if ($result) {
								
								$row = mysqli_fetch_assoc($result) ;
								$sID = $row['seller_ID'];
								$sName =  $row['seller_Name'];
								
							}
			                ?>
					    	<h3><?php echo "$sName";?></h3>
					    	<?php

					    		$stars = array(1, 2, 3, 4, 5);
					    		$count = array();
					    		$total = 0;
					    		

					    		foreach ($stars as $star) {
					    			$query = "SELECT * FROM rating WHERE seller_ID = $sID AND stars = $star";
					    			$result = mysqli_query($con, $query);

					    			$count[$star] = mysqli_num_rows($result);
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
		    			$o_counts = array();

		    			foreach ($types as $type){

			    			$query_p_o_count = "SELECT * FROM order_items WHERE seller_ID = $sellerID AND  order_Type = '$type'";
			    			$query_p_o_count_result = mysqli_query($con, $query_p_o_count);
			    			$o_counts[] = mysqli_num_rows($query_p_o_count_result);

		    			}


		    			$query_p_o_count = "SELECT * FROM order_items WHERE seller_ID = $sellerID AND  order_Type = 'pending' ";
		    			$query_p_o_count_result = mysqli_query($con, $query_p_o_count);
		    			$query_p_o_row = mysqli_num_rows($query_p_o_count_result);


		    		?>

		    		<div>
		    			<p>Pending Order <span style="float: right;"><?php echo $o_counts[0]; ?></span></p>
		    			<p>Complete Order <span style="float: right;"><?php echo $o_counts[1]; ?></span></p>
		    			<p>Cancle Order <span style="float: right;"><?php echo $o_counts[2]; ?></span></p>
		    			<hr/>
		    			<p>Earn in Month <span style="float: right;">$<?php echo"need" ?></span></p>
		    		</div>
		    	</div>
		    	<hr>

		    	<div class="chat">
		    	<table>
			    	<tr>
			    		<th><p class="inline" style="float:left;">Chat</p><p class="a_inline_right">View All</p></th>
			    	</tr>






			    	<?php
			    		$messages_query = "SELECT * FROM messages WHERE sender = 'seller' AND seller_ID = $sellerID AND buyer_ID = 1 LIMIT 2";

			    		$messages_result = mysqli_query($con, $messages_query);

			    		if($messages_result ) {

			    			while($row = mysqli_fetch_assoc($messages_result)) {
			    				$message = $row['message'];
			    				$buyer = $row['buyer_ID'];
			    				$timestamp = $row['timestamp']
			    				?>
				    			<tr>
				    				<td>
				    					<img style="
				    					position: absolute;" src="./images/avatar.jpg" alt="avatar" width="40px" height="40px">
				    					<div style="margin-left: 50px;"> 
				    												    			<p class="inline"><?php echo $buyer . $message; ?></p><br/>
						    			<p class="inline"><?php echo $buyer . $message; ?></p>
						    			<span style="font-size:12px; margin-right: 5px;"  class="p_right" align="center"><?php echo $timestamp ?></span>
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

	    	<div class="mainContent">
	    		<button placeholder="Add New" onclick="showPopup()">Add New</button>

	    		<div class="mainProduct">
		    			<?php 

							$query2 ="SELECT product.*, category.*
									  FROM product
									  JOIN category ON product.category_ID = category.category_ID
									  WHERE product.seller_ID = $sellerID
										";

							$result2 = mysqli_query($con, $query2);

							if ($result2) {
								
								while ($row2 = mysqli_fetch_assoc($result2)) {
									$pID = $row2['product_ID'];
									$img =  $row2['product_Image'];
								 	$price =  $row2['product_Price'];
								 	$name =  $row2['product_Name'];
								 	$ca =  $row2['category_Name'];
						?>

			    			<div class="sProduct">
			    				<img src="./images/<?php echo "$img"; ?>" alt="product_image">
			    				<p><?php echo $ca . "<br/>" . $name; ?></p>
			    				<div class="sProductCont">
			    					<p>$<?php echo $price; ?></p>
			    					<div class="clickIcon">
			    						<i id="toggoleicon<?php echo $pID; ?>"  class="fa-solid fa-bars" onclick="clickbtn(<?php echo $pID; ?>)"></i>
				    					<div id="clickBtn<?php echo $pID; ?>" class="clickBtn">
				    						<a href="product_edit.php?id=<?php echo "$pID"; ?>">Edit Product</a><br/>
				    						<a href="product_delete.php?id=<?php echo"$pID"; ?>">Delete Product</a>
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
		    		$query_p_order = "  SELECT order_items.*, seller.*, buyer.*, product.*
		    							FROM order_items 
		    							JOIN seller ON order_items.seller_ID = seller.seller_ID
		    							JOIN buyer ON order_items.buyer_ID = buyer.buyer_ID
		    							JOIN product ON order_items.product_ID = product.product_ID
		    							WHERE order_items.order_Type = 'pending' AND order_items.seller_ID = $sellerID
		    							";
		    		$result_p_order = mysqli_query($con, $query_p_order);

		    		if($result_p_order) {

		    			while($row = mysqli_fetch_assoc($result_p_order)) {
		    				$p_o_Name = $row['product_Name'];
		    				$p_o_b_Name = $row['fName'];
		    				$p_o_q_Quantity = $row['quantity'];
		    				?>
			    			<p class="inline"><?php echo $p_o_Name; ?></p><p class="p_right"><?php echo $p_o_b_Name . "&nbsp; &nbsp;" . $p_o_q_Quantity . "&nbsp &nbsp"; ?></p>
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
		    		$query_p_order = "  SELECT order_items.*, seller.*, buyer.*, product.*
		    							FROM order_items 
		    							JOIN seller ON order_items.seller_ID = seller.seller_ID
		    							JOIN buyer ON order_items.buyer_ID = buyer.buyer_ID
		    							JOIN product ON order_items.product_ID = product.product_ID
		    							WHERE order_items.order_Type = 'complete' AND order_items.seller_ID = $sellerID
		    							";
		    		$result_p_order = mysqli_query($con, $query_p_order);

		    		if($result_p_order) {

		    			while($row = mysqli_fetch_assoc($result_p_order)) {
		    				$p_o_Name = $row['product_Name'];
		    				$p_o_b_Name = $row['fName'];
		    				$p_o_q_Quantity = $row['quantity'];
		    				?>
			    			<p class="inline"><?php echo $p_o_Name; ?></p><p class="p_right"><?php echo $p_o_b_Name . "&nbsp; &nbsp;" . $p_o_q_Quantity . "&nbsp &nbsp"; ?></p><br/>
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
		    		$query_p_order = "  SELECT order_items.*, seller.*, buyer.*, product.*
		    							FROM order_items 
		    							JOIN seller ON order_items.seller_ID = seller.seller_ID
		    							JOIN buyer ON order_items.buyer_ID = buyer.buyer_ID
		    							JOIN product ON order_items.product_ID = product.product_ID
		    							WHERE order_items.order_Type = 'cancel' AND order_items.seller_ID = $sellerID
		    							";
		    		$result_p_order = mysqli_query($con, $query_p_order);

		    		if($result_p_order) {

		    			while($row = mysqli_fetch_assoc($result_p_order)) {
		    				$p_o_Name = $row['product_Name'];
		    				$p_o_b_Name = $row['fName'];
		    				$p_o_q_Quantity = $row['quantity'];
		    				?>
			    			<p class="inline"><?php echo $p_o_Name; ?></p><p class="p_right"><?php echo $p_o_b_Name . "&nbsp; &nbsp;" . $p_o_q_Quantity . "&nbsp &nbsp"; ?></p>
		    				<?php
		    			}
		    		}
		    	?>
	   		</div>

	    </div>
	    <br/>

	   

	    <!-- js files -->
	    <script type="text/javascript" src="./js/check_online.js"></script>
	    <script type="text/javascript" src="./js/sellerDashboard.js"></script>

	</body>
	</html>
<?php
	} else {
		header("Location: login.php");
	}
?>