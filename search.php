<?php

    require './conn.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Cart</title>
    <link href="./images/ico.png" rel="icon" type="image/png" />
    <link rel="stylesheet" href="./css/search.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include "./header.php" ?>
    <div class="search-container">
    <?php
        $searchQuery = $_GET["query"];


        $sql = "SELECT product.*, category.*
                FROM product 
                JOIN category ON product.category_ID = category.category_ID
                WHERE product_Name 
                LIKE '%" .$searchQuery. "%'
                ";

        $result = $con->query($sql);
        $found = $result->num_rows;


        if ($found > 0) {
            echo '<h4>' .$found . ' items found for &nbsp;"' . $searchQuery . '"</h4>';
            echo '<div class="section">';
            while ($row = $result->fetch_assoc()) {

                ?>
                <a href="./product_view_page.php?id=<?php echo $row['product_ID']; ?>">
		    	<div class="productObj">
		    		<img src="./images/product/<?php echo $row['product_Image']; ?>" alt="product_image">
		    		<p><?php echo$row['category_Name'] . "<br/>" . substr($row['product_Name'],0,15); ?></p>
		    		<div class="sProductCont">
		    			<p>$<?php echo $row['product_Price']; ?></p>
		    		</div>
		    	</div>	
                </a>
                <?php
            }
            echo '</div>';
        } else {
            echo '<h4>No results found &nbsp;"' . $searchQuery . '"</h4>';
        }
        ?>
    
    </div>

    <?php include './footer.php'; ?>
  
</body>
</html>
<?php 
    $con->close();
?>
