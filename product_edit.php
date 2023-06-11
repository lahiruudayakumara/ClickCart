<?php 
	require './conn.php'; 
	$id = $_GET['id'];
	
	if(isset($_POST['update'])) {
	
			$name = $_POST['name'];
			$brand = $_POST['brand'];
			$desc = $_POST['Description'];
			$price = $_POST['price'];
			$category = $_POST['category'];
			 
			$fname = $_FILES["image"] ["name"];
			$ftype = $_FILES["image"] ["type"];
			$fsize = $_FILES["image"] ["size"];
			$ftemp = $_FILES["image"] ["tmp_name"];
			$ferror = $_FILES["image"] ["error"];




			if ($ferror>0) {
				$query = "UPDATE product SET product_Name = '{$name}', product_Brand = '{$brand}', product_Description = '{$desc}', product_Price = '{$price}', category_ID = '{$category}'  WHERE product_ID = '$id'";
					
				if($con->query($query)) {
					echo "<script>alert('Update Sucessfull not change image'); window.location = 'seller_dashboard.php'</script>";
				} else {
					echo "<script>alert('withot update image unsucessful');</script>";
				}
			} else {
				move_uploaded_file($ftemp, "./images/product/" .$fname);
				$query = "UPDATE product SET product_Name = '{$name}', product_Brand = '{$brand}', product_Description = '{$desc}', product_Price = '{$price}', category_ID = '{$category}', product_Image = '{$fname}'  WHERE product_ID = '$id'";
					
				if($con->query($query)) {
					echo "<script>alert('Update Sucessfull'); window.location = 'seller_dashboard.php'</script>";
				} else {
					echo "<script>alert('unsucessful');</script>";
				}
			}

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Cart</title>
	<link href="./images/ico.png" rel="icon" type="image/png" />
    <link rel="stylesheet" href="./css/productEdit.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body>
	<div class="mainSection">
	<h2>Edit Product</h2>
	    	<form method="POST" action="product_edit.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
				<select name="category" id="category">
					<?php 
						$query = "SELECT * FROM category";
						$result = $con->query($query);

						$query1 = "SELECT product.*, category.*
									FROM product
									JOIN category ON  product.category_ID = category.category_ID
									WHERE product_ID = $id";

						$result1 = $con->query($query1);
						$product = $result1->fetch_assoc();
						?>

						<option value="<?php echo $product['category_ID']; ?>"><?php echo $product['category_Name'] . "-Selected Category"; ?></option>

						<?php

						if($result) {
							while ($row = $result->fetch_assoc()) {

								?>

								<option value="<?php echo $row['category_ID']; ?>"><?php echo $row['category_Name']; ?></option>

								<?php
							}
						}
					?>
				</select>
                <?php 

                ?>
				<label>Name</label>
				<input type="text" name="name" value="<?php echo $product['product_Name']; ?>"><br/>
				<label>Brand</label>
                <input type="text" name="brand" value="<?php echo $product['product_Brand']; ?>" required/><br/>
				<label>Product Description</label>
				<textarea rows="4" name="description" ><?php echo $product['product_Description']; ?></textarea>
				<label>Price</label>
				<input type="text" name="price" value="<?php echo $product['product_Price']; ?>" required/><br/>
				<img id="img" src="./images/product/<?php echo $product['product_Image'] ?>">
				<input id="image" type="file" name="image" onchange="preview()" />
				<input  class="update" name="update"  type="submit" value="Update"/>
				<input class="cancel" type="button" value="Cancel"  onclick="window.location = 'seller_dashboard.php'"/>
	    	</form>
	  	</div>

	<!-- javascript files -->
	<script src="./js/imgPreview.js"></script>
    
</body>
</html>