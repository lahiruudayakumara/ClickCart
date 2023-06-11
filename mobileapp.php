<?php require "./conn.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Cart</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/mobileapp.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="stylesheet" href ="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>

<?php 
    include "./header.php"
?>

<div>
    <img class="image" src="./images/3.jpg">
</div>


<div class="footer-block-information">
                <a href="https://play.google.com">
                <img class="playstore" src="./images/playstore.png">
                </a>
                <a href="https://www.apple.com/app-store/">
                <img class="appstore" src="./images/appstore.jpg">
                </a>
            </div>

 <div>
    
    <img class="image" src="./images/3.jpg" style="margin-top:50px">
    
</div>

<?php
    require './footer.php'
?>
</body>
</html>
<?php $con->close(); ?>

<!--reference: W3Schools-->