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
    <link href="./images/ico.png" rel="icon" type="image/png" />
    <link rel="stylesheet" href="./css/addtocart.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript">
    </script>

</head>

<body>
    <?php include "./header.php" ?>
    <?php


    if(isset($_POST['update'])) {
        $productPrice = 0;
        $quantity = 0;
        $totalCost = 0;

        $qty = $_POST['quantity'];
        $qId = $_GET['id'];
        $cartUpdateQuery = "UPDATE cart SET quantity='$qty', price =' 250' WHERE buyer_ID= $id AND cart_ID = $qId";
        if ($con->query($cartUpdateQuery) === TRUE) {
            //echo "<script>alert('Record updated successfully');</script>";
          } else {
            echo "Error updating record: ";
          }
    } else if(isset($_POST['select'])) {
        $qId = $_GET['id'];
        $cartQuery = "SELECT cart.*, product.* 
        FROM cart 
        JOIN product ON product.product_ID = cart.product_ID
        WHERE cart.buyer_ID = $id AND cart.cart_ID = $qId ";

        $cartResult = $con->query($cartQuery);
        $cartRow = $cartResult->fetch_assoc();

        $productID = $cartRow['product_ID'];
        $quantity = $cartRow['quantity'];
        $productPrice = $cartRow['product_Price'];
        $totalCost = $cartRow['product_Price'] * $quantity;

    } else {
        $productPrice = 0;
        $quantity = 0;
        $totalCost = 0;
    }
    ?>
    <div class="wrapper">
        <div class="left-container">
            <div class="action-header">
                <div>Cart List</div>

            </div>
            <?php 
                $queryQnt = "SELECT cart.*, product.* 
                            FROM cart 
                            JOIN product ON product.product_ID = cart.product_ID
                            WHERE cart.buyer_ID = $id";

                $resultQnt = $con->query($queryQnt);
                while($row = $resultQnt->fetch_assoc()) {

            ?>
            <div class="cart-item">
                <div class="image"><img src="./images/product/<?php echo $row['product_Image']; ?>" /></div>
                <div class="decsription">
                    <?php echo $row['product_Name']; ?><br/>
                    <?php echo $row['product_Brand']; ?><br/>
                    <?php echo $row['product_Description']; ?><br/>
                    <?php echo "$" . $row['product_Price']; ?><br/>
                </div>
                <div class="qty-selector">
                    
                    <form class="qty-change" action="add_to_cart.php?id=<?php echo $row['cart_ID']; ?>" method="post">
                        <input class="inputQ" type="number" name="quantity" value="<?php echo $row['quantity']; ?>" /><br/>
                        <button type="submit" class="btn" name="select">Select</button><br/>
                        <button type="submit" class="btn" name="update">Update</button><br/>
                        <a href="cart_item_delete.php?cId=<?php echo $row['cart_ID']; ?>">
                            <button type="button" class="btn" >Delete</button>
                        </a>
                    </form>
                </div>

            </div>
            <?php  } ?>

        </div>

        <div class="right-container">
        <form action="placeorder.php?pId=<?php echo $productID; ?>" method="POST">
            <h1>Order details</h1>
            <div class="order-details">
                <div class="title"> Item</div>
                <div class="value"><span>$</span><?php echo $productPrice ?></div>
            </div>
            <div class="order-details">
                <div class="title">Quantity</div>
                <input class="qnti" type="text" name="quantity" id="" value="<?php echo $quantity; ?>" readonly/>
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



    <?php include "./footer.php" ?>

</body>

</html>
<?php
} else {
    header('Location: login.php');
    exit();
}
$con->close();
?>