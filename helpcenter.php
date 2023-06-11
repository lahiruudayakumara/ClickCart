<?php require "./conn.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Cart</title>
    <link href="./images/ico.png" rel="icon" type="image/png" />
    <link rel="stylesheet" href="./css/helpcenter.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include "./header.php" ?>

        <div class="container">
            <div>
                <img class="image" src="./images/3.jpg" alt="helpcenter" width="100%">
            </div>
            <h2>Browse Help Articles</h2>
            <center>
            <div class="article">
                <div class="article-box">
                <i class="fa-solid fa-user fa-2xl" style="color: #000000; cursor:pointer;"></i>
                <p><span style="font-size:medium; cursor:pointer;">Account</span></p>
                </div>
            </div>

            <div class="article">
                <div class="article-box">
                <i class="fa-sharp fa-solid fa-bag-shopping fa-2xl" style="color: #000000;cursor:pointer;"></i>
                <p><span style="font-size:medium;cursor:pointer;">Buying and Selling</span></p>
                </div>
            </div>

            <div class="article">
                <div class="article-box">
                <i class="fa-solid fa-user-shield fa-2xl" style="color: #000000;cursor:pointer;"></i>
                <p><span style="font-size:medium;cursor:pointer;">User protection</span></p>
                </div>
            </div>

            <div class="article">
                <div class="article-box">
                <i class="fa-sharp fa-solid fa-chart-area fa-2xl" style="color: #000000;cursor:pointer;"></i>
                <p><span style="font-size:medium;cursor:pointer;">Fees and Billing</span></p>
            </div>
            </div>
<br>
            <div class="article">
                <div class="article-box">
                <i class="fa-solid fa-credit-card fa-2xl" style="color: #000000;cursor:pointer;"></i>
                <p><span style="font-size:medium;cursor:pointer;">Payment</span></p>
                </div>
            </div>

            <div class="article">
                <div class="article-box">
                <i class="fa-sharp fa-solid fa-rotate fa-2xl" style="color: #000000;cursor:pointer;"></i>
                <p><span style="font-size:medium;cursor:pointer;">Returns and Refunds</span></p>
                </div>
            </div>

            <div class="article">
                <div class="article-box">
                <i class="fa-solid fa-envelope-open-text fa-2xl" style="color: #000000;cursor:pointer;"></i>
                <p><span style="font-size:medium;cursor:pointer;">Marketing</span></p>
                </div>
            </div>
              
            <div class="article">
                <div class="article-box">
                <i class="fa-sharp fa-solid fa-gear fa-2xl" style="color: #000000;cursor:pointer;"></i>
                <p><span style="font-size:medium;cursor:pointer;">User settings</span></p>
                </div>
            </div>
            </center>
        </div>

    <?php include "./footer.php" ?> 

    <!-- js files -->
    <script src="./js/check_online.js"></script>

</body>
</html>
<?php $con->close(); ?>