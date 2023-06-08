<?php
require './conn.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Cart</title>
    <link rel="stylesheet" href="./css/addtocart.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript">
    </script>

</head>

<body>
    <?php include "./header.php" ?>
    <?php
    require './conn.php';
    
    $cartQuery = "SELECT * from cart where buyer_id='2'";
    $cartResult = $con->query($cartQuery);
    $cartRow = $cartResult->fetch_assoc();
    $productID = $cartRow['product_id'];
    $quantity = $cartRow['product_qty'];
    $productQuery = "SELECT * from product where product_ID='$productID'";
    $productResult = $con->query($productQuery);
    $productRow = $productResult->fetch_assoc();
    $totalCost = $productRow['product_Price'] * $quantity;

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $qty = $_POST['quantity'];
        $cartId = $cartRow['cart_id'];
        $cartUpdateQuery = "UPDATE cart SET product_qty='$qty' WHERE cart_id='$cartId'";
        if ($con->query($cartUpdateQuery) === TRUE) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . $con->error;
          }
    }
    ?>
    <div class="wrapper">
        <div class="left-container">
            <div class="action-header">
                <div><input type="checkbox"/> Select all</div>
                <div><i class="fa-solid fa-trash"></i> Delete</div>
            </div>
            <div class="cart-item">
                <div class="action"><input type="checkbox" /></div>
                <div class="image"><img src="./images/product/<?php echo $productRow['product_Image']; ?>" /></div>
                <div class="decsription"><?php echo $productRow['product_Name']; ?></div>
                <div class="qty-selector">
                    <form class="qty-change" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <input type="text" name="quantity" value="<?php echo $quantity; ?>" />
                    <button class="qty-up"><i class="fa-solid fa-chevron-up"></i></button>
                    <button class="qty-down"><i class="fa-solid fa-chevron-down"></i></button>
                    <form>
                </div>

            </div>

        </div>

        <div class="right-container">
            <h1>Order details</h1>
            <div class="order-details">
                <div class="title"> Item</div>
                <div class="value"><span>$</span><?php echo $productRow['product_Price']; ?></div>
            </div>
            <div class="order-details">
                <div class="title">Quantity</div>
                <div class="value"><?php echo $quantity; ?></div>
            </div>
            <!-- <div class="order-details">
                <div class="title"> Shipping </div>
                <div class="value"> $2.00</div>
            </div> -->
            <div class="order-details">
                <div class="title"><strong>Total</strong> </div>
                <div class="value"><span>$</span><?php echo number_format($totalCost,2);?></div>
            </div>
            <a href="./placeorder.php" class="checkout-button">CHECKOUT</a>
        </div>
    </div>
   

    <?php include "./footer.php" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="./js/addtocart.js"></script>

</body>

</html>
<?php
$con->close();
?>