<?php
require './conn.php';

session_start();

if (isset($_POST['submit']) && $_POST['email'] && $_POST['password']) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM seller WHERE email = '$email' AND password = '$password'";
    $result = $con->query($query);
    $rowCount = $result->num_rows;

    $query2 = "SELECT * FROM buyer WHERE email = '$email' AND password = '$password'";
    $result2 = $con->query($query2);
    $rowCount2 = $result2->num_rows;

    if ($rowCount == 1) {
        $row = $result->fetch_assoc();

        $sellerID = $row['seller_ID'];

        $_SESSION['user_role'] = 'seller';
        $_SESSION['seller_ID'] = $sellerID;

        header("Location: seller_dashboard.php"); // Redirect to seller dashboard page
        exit();
    } else if ($rowCount2 == 1) {
        $row = $result2->fetch_assoc();

        $buyerID = $row['buyer_ID'];

        $_SESSION['user_role'] = 'buyer';
        $_SESSION['buyer_ID'] = $buyerID;

        header("Location: index.php"); // Redirect to seller dashboard page
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store page</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/store.css">
    <link rel="stylesheet" href="./css/index.css">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Responsive Product Card */
        .product-card {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .product-card .image-style {
            flex-basis: 200px;
        }

        .product-card .img-style {
            width: 100%;
            height: auto;
        }

        .product-card .button {
            margin-top: 10px;
        }

        /* Footer */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
        }

        .rating-list{
            border-style: solid;
            margin: 4px;
        }

        .footer {
            background-color: #f8f8f8;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <?php include './header.php'; ?>


    <?php
    include_once("conn.php"); //connection establishment 

    $query = "SELECT * FROM product";
    $sellerquery = "SELECT p.*, s.seller_Name FROM seller s JOIN product p ON s.seller_ID = p.seller_ID ";
    $result = mysqli_query($con, $sellerquery);
    
    $columnSize = 3; // Number of columns
    $rowCount = mysqli_num_rows($result); // Total number of products
    $productsPerColumn = ceil($rowCount / $columnSize); // Number of products per column
    $counter = 0; // Counter to keep track of products

    $columnCounter = 0; // Counter to keep track of columns
    ?>
    <nav>
        <div class="heading">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="store_details.php">Store Details</a></li>
            </ul>
        </div>
    </nav>
    <!-- Product card -->
    <div class="content">
        <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                if ($counter % $productsPerColumn == 4) {
                    // Start a new column
                    echo '<div class="column">';
                    $columnCounter++;
                }
            ?>
                <div class="product-card">
                    <div class="image-style">
                        <img class="img-style" src="./images/product/<?php echo $row["product_Image"]; ?>" alt="Cameras">
                        <p><?php echo $row["product_Name"]; ?></p>
                        <p><?php echo $row["seller_Name"]; ?></p>
                        <p>$<?php echo $row["product_Price"]; ?></p>
                        <div><a href="product_view_page.php" class="button">View Product</a></div>
                        <div><a href="add_to_cart.php" class="button">Add to cart</a></div>
                        <div><a href="addreview.php?id=<?php echo $row['product_ID']; ?>" class="button">Add Review</a></div>

                        <?php
                        $id = $row["product_ID"];
                        $queryone = "SELECT * FROM rating WHERE product_ID = $id";
                        $resultone = mysqli_query($con, $queryone);
                        while ($reviewRow = mysqli_fetch_assoc($resultone)) {
                            ?>
                            <div class="rating-list">
                                <p>Rating: <?php echo $reviewRow["stars"]; ?></p>
                                <p>Comment: <?php echo $reviewRow["comment"]; ?></p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
                $counter++;
                if ($counter % $productsPerColumn == 0 || $counter == $rowCount || $columnCounter == $columnSize) {
                    // End the column if the counter is a multiple of products per column, it is the last product, or the column counter matches the desired number of columns
                    echo '</div>';
                    $columnCounter = 4;
                }
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <?php include './footer.php'; ?>
    </footer>

</body>

</html>
<?php
$con->close();
?>
