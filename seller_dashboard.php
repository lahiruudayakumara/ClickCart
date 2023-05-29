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
	            <ul type="1">
	            	<li><a href="./logout.php">Seller Account</a></li>
	                <li><a href="#">Contact Us</a></li>
	                <li><a href="#">Help Center</a></li>
	                <li><a href="#">My Business</a></li>

	            </ul>
	        </nav>
	    </header> 

	    <div style="padding: 5px; display: flex; margin-top: 10px;">
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
								$sName =  $row['seller_Name'] . "<br/>";
								
							}
			                ?>
					    	<h3><?php echo "$sName";?></h3>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
			    		</div>
	    			</div>

		    		<hr/>
		    		<div>
		    			<p>Pending Order <span style="margin-left: 65%;">20</span></p>
		    			<p>Pending Order <span style="margin-left: 65%;">20</span></p>
		    			<p>Pending Order <span style="margin-left: 65%;">20</span></p>
		    			<hr/>
		    			<p>Earn in Month</p>
		    		</div>
		    	</div>

	    	</div> 

	    	<div class="mainContent">
	    		<button placeholder="Add New"><a href="item_add.php">Add New</a></button>

	    		<div class="mainProduct">
		    			<?php 

							$query2 ="SELECT product.*, category.*
									   FROM product
										JOIN category ON product.category_ID = category.category_ID
										WHERE product.seller_ID = $sellerID;
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
			    				<img src="./images/<?php echo "$img"; ?>">
			    				<p><?php echo $ca; ?></p>
			    				<p><?php echo $name; ?></p>
			    				<div class="sProductCont">
			    					<p>$<?php echo $price; ?></p>
			    					<div class="clickIcon">
			    						<i  class="fa-solid fa-bars"></i>
				    					<div class="clickBtn">
				    						<a href="item_edit.php?<?php echo "$pID"; ?>">Edit</a><br/>
				    						<a href="item_delete.php?id=<?php echo"$pID"; ?>">Delete</a>
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
		    		<table border="0px">
		    			<tr>
		    				<th style="display:flex;">
		    					<p>Heading</p>
		    					<a href="#">View All</a>
		    				</th>
		    			</tr>
		    			<tr>
		    				<td>
		    					<p>Name</p>
		    					<span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
		    				</td>
		    			</tr>
		    			<tr>
		    				<td>
		    					<p>Name</p>
		    					<span>Lorem ipsume is dummy text</span>
		    				</td>
		    			</tr>
		    			<tr>
		    				<td>
		    					<p>Name</p>
		    					<span>Lorem ipsume is dummy text</span>
		    				</td>
		    			</tr>
		    		</table>
	   		</div>
	   		<div class="bottomCont">
		    		<table border="0px">
		    			<tr>
		    				<th style="display:flex;">
		    					<p>Heading</p>
		    					<a href="#">View All</a>
		    				</th>
		    			</tr>
		    			<tr>
		    				<td>
		    					<p>Name</p>
		    					<span>Lorem ipsume is dummy text</span>
		    				</td>
		    			</tr>
		    			<tr>
		    				<td>
		    					<p>Name</p>
		    					<span>Lorem ipsume is dummy text</span>
		    				</td>
		    			</tr>
		    			<tr>
		    				<td>
		    					<p>Name</p>
		    					<span>Lorem ipsume is dummy text</span>
		    				</td>
		    			</tr>
		    		</table>
	   		</div>

	   		<div class="bottomCont">
		    		<table border="0px">
		    			<tr>
		    				<th style="display:flex;">
		    					<p>Heading</p>
		    					<a href="#">View All</a>
		    				</th>
		    			</tr>
		    			<tr>
		    				<td>
		    					<p>Name</p>
		    					<span>Lorem ipsume is dummy text</span>
		    				</td>
		    			</tr>
		    			<tr>
		    				<td>
		    					<p>Name</p>
		    					<span>Lorem ipsume is dummy text</span>
		    				</td>
		    			</tr>
		    			<tr>
		    				<td>
		    					<p>Name</p>
		    					<span>Lorem ipsume is dummy text</span>
		    				</td>
		    			</tr>
		    		</table>
	   		</div>
	    </div>
	    <br/>

	    <?php include './footer.php' ?>

	</body>
	</html>
<?php
	} else {
		header("Location: login.php");
	}
?>