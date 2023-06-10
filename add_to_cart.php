<?php
    require './conn.php';

    session_start();

    if ($_SESSION['user_role'] == "buyer" ) { 
        $id = $_SESSION['buyer_ID'];

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

    $cartQuery = "SELECT cart.*, product.* 
                FROM cart 
                JOIN product ON product.product_ID = cart.product_ID
                WHERE cart.buyer_ID = $id";
    $cartResult = $con->query($cartQuery);
    $cartRow = $cartResult->fetch_assoc();
    $productID = $cartRow['product_ID'];
    $quantity = $cartRow['quantity'];
    $totalCost = $cartRow['product_Price'] * $quantity;

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $qty = $_POST['quantity'];
        $cartId = $cartRow['cart_ID'];
        $cartUpdateQuery = "UPDATE cart SET quantity='$qty', price =' $totalCost' WHERE buyer_ID= $id";
        if ($con->query($cartUpdateQuery) === TRUE) {
            echo "<script>alert('Record updated successfully');</script>";
          } else {
            echo "Error updating record: ";
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
                <div class="image"><img src="./images/product/<?php echo $cartRow['product_Image']; ?>" /></div>
                <div class="decsription"><?php echo $cartRow['product_Name']; ?></div>
                <div class="qty-selector">
                    <form class="qty-change" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <input type="text" name="quantity" value="<?php echo $quantity; ?>" />
                        <button class="qty-up"><i class="fa-solid fa-chevron-up"></i></button>
                        <button class="qty-down"><i class="fa-solid fa-chevron-down"></i></button>
                    </form>
                </div>

            </div>

        </div>

        <div class="right-container">
        <form action="placeorder.php?pId=<?php echo $productID; ?>" method="POST">
            <h1>Order details</h1>
            <div class="order-details">
                <div class="title"> Item</div>
                <div class="value"><span>$</span><?php echo $cartRow['product_Price']; ?></div>
            </div>
            <div class="order-details">
                <div class="title">Quantity</div>
                <input style="outline:none; border: none; text-align: right; margin-left: 5px;" type="text" name="quantity" id="" value="<?php echo $quantity; ?>" readonly/>
            </div>
            <!-- <div class="order-details">
                <div class="title"> Shipping </div>
                <div class="value"> $2.00</div>
            </div> -->
            <div class="order-details">
                <div class="title"><strong>Total</strong> </div>
                <div class="value"><span>$</span><?php echo number_format($totalCost,2);?></div>
            </div>
            
                <button class="checkout-button" name="buy_now">CHECKOUT</button>
            </form>
        </div>
    </div>
   

    <p>Hello</p>


    
    <?php include "./footer.php" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="./js/addtocart.js"></script>

</body>

</html>
<?php
} else {
    header('Location: login.php');
    exit();
}
$con->close();
?>