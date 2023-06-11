<!-- Login goes here -->
<?php

    require './conn.php';

    session_start();

    $sql = "SELECT * from category WHERE category_ID LIMIT 5";
    $all_category = $con->query($sql);
    $sql = "SELECT * from product WHERE product_ID  LIMIT 5";
    $all_products = $con->query($sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Cart</title>
    <link href="./images/ico.png" rel="icon" type="image/png" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <?php include "./header.php" ?>

    <!-- SLIDER -->
    <!-- Reference - W3School -->
    <div class="slider-container">
      <div class="slider">
        <div class="slider-item">
          <img class="slider-img" src="./images/1.jpg" alt="Slider Image 1">
        </div>
        <div class="slider-item">
          <img class="slider-img" src="./images/2.jpg" alt="Slider Image 2">
        </div>
        <div class="slider-item">
          <img class="slider-img" src="./images/3.jpg" alt="Slider Image 3">
        </div>
      </div>
      <div class="slider-buttons"></div>
    </div>

<!-- SLIDER FUNCTAIONALITY -->

    <!--Category part -->

       <main>
          <h2>Popular Categories</h2>
            <div class="obj-container">
            <?php
              while($row = mysqli_fetch_assoc($all_category)){
            ?>
                <div class="category-name">
                    <div class="image-style">
                      <img class="img-style" src="./images/category_img/<?php echo $row["category_Picture"]; ?>" alt="Cameras">
                      <p><?php echo $row["category_Name"]; ?></p>
                     </div>
                </div>
            <?php } ?>
            </div>
        </main>


          <!-- products part-->
        <main>
          <h2>Popular Products</h2>
          <div class="obj-container">
          <?php while($row = mysqli_fetch_assoc($all_products)){ ?>
            <a href="./product_view_page.php?id=<?php echo $row['product_ID']; ?>">
            <div class="category-name">
              <div class="image-style">
                <img class="img-style" src="./images/product/<?php echo $row["product_Image"]; ?>" alt="Cameras">
                <p><?php echo substr($row["product_Name"], 0, 15); ?></p>
                <p><?php echo substr($row["product_Brand"], 0, 15); ?></p>
                <p>$<?php echo $row["product_Price"];?></p>
              </div>             
            </div>
          </a>
          <?php } ?>
            </div>
                <!-- See All Button -->
         <div class="btn-box">
            <a href="./popular_product.php">
              <button class="seeall-btn">See all</button>
            </a>
         </div>
        </main>  
            
  <?php include './footer.php'; ?>

  <script src="./js/index.js"></script>
  
</body>
</html>
<?php
	$con->close();
?>