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

            <div>
                    <img class="product_image" src="images/sample.jfif">
            </div>

            <div>
                    <p class="product_title">HP I5s-DUIII4TU Laptop (hp NoteBook) JET BLACK MS Office Home</p><br/>
                    <p class="product_des">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p><br/>
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
            <div class="price">$480.00</div>
            <div class="discount"><s>$599.00</s>&nbsp;&nbsp;&nbsp;&nbsp;20% OFF</div>
            <div class="quantity">
                <p>Quantity : </p>
                <input type="number" min="1" max="10" value="1">
            </div>

            <div class="btn-box">
                <button class="buy-btn">Buy Now</button>
                <button class="cart-btn">Add to cart</button>
            </div>

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

    <?php include "./footer.php" ?> 
</body>
</html>