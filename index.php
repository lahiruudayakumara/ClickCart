
<?php
    include './conn.php';

    session_start();

    if($_SESSION['user_role'] == "buyer") {

        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Cart</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/product_view_page.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="stylesheet" href ="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include "./header.php" ?>
    <div class="container">
        <!-- Slider main container -->
<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide"><img src="images/3.jpg"></div>
    <div class="swiper-slide"><img src="images/3.jpg"></div>
    <div class="swiper-slide"><img src="images/3.jpg"></div>
    <div class="swiper-slide"><img src="images/3.jpg"></div>

  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

</div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
        autoplay: {
            delay:3000,
            disableOnInteraction: false,
        },
        loop: true,

        pagination: {
        el: '.swiper-pagination',
        clickable: true,
        },

        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },

        });
    </script>

            <div>
            <h3>Popular Categories</h3>
                        <div class="category-name">
                            <div class="image-style">
                                <img class="img-style" src="./images/camera.png" alt="Cameras">
                                <p>Cameras</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/comb.jpg" alt="Combs">
                            <p>Combs</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/earbud.jpg" alt="Earbuds">
                            <p>Earbuds</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" style="height:85%" src="./images/phone.jpg" alt="Smartphones">
                            <p>Smartphones</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/powerbank.jpg" alt="Powerbanks">
                            <p>Powerbanks</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/smartwatch.jpg" alt="Smart watches">
                            <p>Smart Watches</p>
                            </div>
                            <div class="btn-box">
                            <button class="buy-btn">See all</button>
                        </div>
                        </div>

<!-- deals part -->
                        <div>
            <h3>Popular Categories</h3>
                        <div class="category-name">
                            <div class="image-style">
                                <img class="img-style" src="./images/camera.png" alt="Cameras">
                                <p>Cameras</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/comb.jpg" alt="Combs">
                            <p>Combs</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/earbud.jpg" alt="Earbuds">
                            <p>Earbuds</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" style="height:85%" src="./images/phone.jpg" alt="Smartphones">
                            <p>Smartphones</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/powerbank.jpg" alt="Powerbanks">
                            <p>Powerbanks</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/smartwatch.jpg" alt="Smart watches">
                            <p>Smart Watches</p>
                            </div>
                            <div class="btn-box">
                            <button class="buy-btn">See all</button>
                        </div>
                        </div>
                    
                                         
</body>
</html>
        <?php
    } else {
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Cart</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/product_view_page.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="stylesheet" href ="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include "./header.php" ?>
    <div class="container">
        <!-- Slider main container -->
<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide"><img src="images/3.jpg"></div>
    <div class="swiper-slide"><img src="images/3.jpg"></div>
    <div class="swiper-slide"><img src="images/3.jpg"></div>
    <div class="swiper-slide"><img src="images/3.jpg"></div>

  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

</div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="./js/swiper.js"></script>
    <!-- <script>
        const swiper = new Swiper('.swiper', {
        autoplay: {
            delay:3000,
            disableOnInteraction: false,
        },
        loop: true,

        pagination: {
        el: '.swiper-pagination',
        clickable: true,
        },

        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },

        });
    </script> -->

            <div>
            <h3>Popular Categories</h3>
                        <div class="category-name">
                            <div class="image-style">
                                <img class="img-style" src="./images/camera.png" alt="Cameras">
                                <p>Cameras</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/comb.jpg" alt="Combs">
                            <p>Combs</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/earbud.jpg" alt="Earbuds">
                            <p>Earbuds</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" style="height:85%" src="./images/phone.jpg" alt="Smartphones">
                            <p>Smartphones</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/powerbank.jpg" alt="Powerbanks">
                            <p>Powerbanks</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/smartwatch.jpg" alt="Smart watches">
                            <p>Smart Watches</p>
                            </div>
                            <div class="btn-box">
                            <button class="buy-btn">See all</button>
                        </div>
                        </div>

<!-- deals part -->
                        <div>
            <h3>Popular Categories</h3>
                        <div class="category-name">
                            <div class="image-style">
                                <img class="img-style" src="./images/camera.png" alt="Cameras">
                                <p>Cameras</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/comb.jpg" alt="Combs">
                            <p>Combs</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/earbud.jpg" alt="Earbuds">
                            <p>Earbuds</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" style="height:85%" src="./images/phone.jpg" alt="Smartphones">
                            <p>Smartphones</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/powerbank.jpg" alt="Powerbanks">
                            <p>Powerbanks</p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/smartwatch.jpg" alt="Smart watches">
                            <p>Smart Watches</p>
                            </div>
                            <div class="btn-box">
                            <button class="buy-btn">See all</button>
                        </div>
                        </div>
                    
                        
                                         
</body>
</html>
        <?php
    }
?>