<?php 
    require './conn.php'; 
    $pID = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Cart</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/product_view_page.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include "./header.php" ?>

    <?php
        $query = "SELECT *FROM product WHERE product_ID = $pID";
        $result = $con->query($query);
        $row = $result->fetch_assoc();
        $nM = $row['product_Name'];
        $description = $row['product_Description']
    ?>

        <div class="section">
            <div>
                    <img class="product_image" src="./images/product/<?php echo $row['product_Image'] ?>">
            </div>

            <div>
                    <p class="product_title"><?php echo $nM; ?></p><br/>
                    <p class="product_des"><?php echo $description; ?></p><br/>
            </div>

            <div class="ratings">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            
                <a href="#">&nbsp;&nbsp;14 Ratings</a>
                <a class="rating_num" href="#"> &nbsp;&nbsp;20 Answered Questions</a>
            </div>

            <div class="brand">Brand : HP</div>
            <div class="price"><?php echo $row['product_Price'] ?></div>
            <!--<div class="discount"><s>$599.00</s>&nbsp;&nbsp;&nbsp;&nbsp;20% OFF</div>-->
            <div class="quantity">
                <p>Quantity : </p>
                <input type="number" min="1" max="10" value="1">
            </div>

            <div class="btn-box">
                <button class="buy-btn">Buy Now</button>
                <button class="cart-btn">Add to cart</button>
            </div>
            </br>

            <div class="delivery-description">
                <div class="delivery-box">
                    <p><span style="font-size: medium;"><b>Delivery</b></span></p>
                    <p>There are many variations of passages of Lorem Ipsum available, 
                    but the majority have suffered alteration in some form, by injected humour</p>
                </div>
            </div>

            <div class="delivery-description">
                <div class="delivery-box">
                    <p><span style="font-size: medium;"><b>Standard Delivery</b></span></p>
                    <p>There are many variations of passages of Lorem Ipsum available, 
                    but the majority have suffered alteration in some form, by injected humour</p>
                </div>
            </div>

            <div class="delivery-description">
                <div class="delivery-box">
                    <p><span style="font-size: medium;"><b>Services</b></span></p>
                    <p>There are many variations of passages of Lorem Ipsum available, 
                    but the majority have suffered alteration in some form, by injected humour</p>
                </div>
            </div>

            <div class="delivery-description">
                <div class="delivery-box">
                    <p><span style="font-size: medium;"><b>Sold by</b></span></p>
                    <p>There are many variations of passages of Lorem Ipsum available, 
                    but the majority have suffered alteration in some form, by injected humour</p>
                </div>
            </div>
            </div>

            <div class="rating-section">
                <h2>4.5</h2>
                <div>
                    <img class="star-row" src="./images/startrow.png" alt="Star Row">
                </div>
                    <div >
                        <img class="stars" src="./images/starts.png" alt="Stars">
                    </div>
                    <div class="rating-num">
                        <p><span style="margin-left:5px; margin-top: 5px;">12</span></p>
                        <p><span style="margin-left:5px; margin-top: 5px;">8</p>
                        <p><span style="margin-left:5px; margin-top: 5px;">2</p>
                        <p><span style="margin-left:5px; margin-top: 5px;">0</p>
                        <p><span style="margin-left:5px; margin-top: 5px;">0</p>
                    </div>
                </div>

                <div  class="review-1">
                    <p>Product Reviews</p>
                </div>

                <div class="review-2">
                    <p>Date and time</p>
                    <div class="review-image">
                        <img src="./images/comb.jpg">
                    </div>
                    <div class="review-des">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</p>
                    </div>
                </div>







    <?php include "./footer.php" ?> 
</body>
</html>