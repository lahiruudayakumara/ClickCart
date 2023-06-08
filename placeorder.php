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
    <link rel="stylesheet" href="./css/placeorder.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript">
    </script>

</head>

<body>
    <?php include "./header.php" ?>
    <div class="wrapper">
        <div class="left-container">
            <div class="details">
                <form action="/action_page.php">
                    <div class="bla">
                        <label for="des">Delivery To:</label>
                        <input type="text" id="de" name="de"><br>
                    </div>

                    <textarea rows="5" cols="50" name="description"></textarea><br><br>
                    <div class="bla">
                        <label for="des">Bill to the name:</label>
                        <input type="text" id="de" name="de"><br>
                    </div>
                    <div class="bla">
                        <label for="des">Email:</label>
                        <input type="text" id="de" name="de"><br>
                    </div>
                </form>
                <div class="details4"> Select Payment Method: </div>
            </div>
            <div class="items">
                <div class="item"><i class="fa-solid fa-money-bill-1-wave"></i><input type="radio" /></div>
                <div class="item"><i class="fa-brands fa-cc-visa"></i><input type="radio" /></div>
                <div class="item"><i class="fa-brands fa-cc-mastercard"></i><input type="radio" /></div>
                <div class="item"><i class="fa-brands fa-cc-paypal"></i><input type="radio" /></div>
            </div>
        </div>

        <div class="right-container">
            <h1>Order details</h1>
            <div class="order-details">
                <div class="title"> Item(1) </div>
                <div class="value"> $48.00</div>
            </div>
            <div class="order-details">
                <div class="title"> Shipping </div>
                <div class="value"> $2.00</div>
            </div>
            <div class="order-details">
                <div class="title"><strong>Total</strong> </div>
                <div class="value"> $50.00</div>
            </div>
            <a href="#" class="placeorder-button">PLACE ORDER</a>
        </div>
    </div>



    <?php include "./footer.php" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="./js/addtocart.js"></script>

</body>

</html>
<?php
$con->close();
?></meta>