
<!-- Login goes here -->
<?php
    include './conn.php';
    $_SESSION['user_role'] = 'buyer';
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
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php include "./header.php" ?>

    <!-- SLIDER -->
    <div class="slider-container">
  <div class="slider">
    <div class="slider-item">
      <img class="slider-img" src="./images/3.jpg" alt="Slider Image 1">
    </div>
    <div class="slider-item">
      <img class="slider-img" src="./images/3.jpg" alt="Slider Image 2">
    </div>
    <div class="slider-item">
      <img class="slider-img" src="./images/3.jpg" alt="Slider Image 3">
    </div>
  </div>
  <div class="slider-buttons"></div>
</div>

<!-- SLIDER FUNCTAIONALITY -->

<script>
  // Slider functionality
  const slider = document.querySelector('.slider');
  const sliderItems = Array.from(document.querySelectorAll('.slider-item'));
  const sliderButtonsContainer = document.querySelector('.slider-buttons');
  let currentSlide = 0;

  // Create slider buttons
  sliderItems.forEach((_, index) => {
    const button = document.createElement('div');
    button.classList.add('slider-button');
    if (index === currentSlide) {
      button.classList.add('active');
    }
    button.addEventListener('click', () => {
      goToSlide(index);
    });
    sliderButtonsContainer.appendChild(button);
  });

  // Auto slide every 3 seconds
  setInterval(() => {
    goToSlide((currentSlide + 1) % sliderItems.length);
  }, 3000);

  // Go to specific slide
  function goToSlide(index) {
    slider.style.transform = `translateX(-${index * 100}%)`;
    sliderButtonsContainer.querySelector('.active').classList.remove('active');
    sliderButtonsContainer.children[index].classList.add('active');
    currentSlide = index;
  }
</script>

            <div>
            <h2>Popular Categories</h2>

                        <div class="category-name">
                            <div class="image-style">
                                <img class="img-style" src="./images/camera.png" alt="Cameras">
                                <p><a href="#">Electronics</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/comb.jpg" alt="Combs">
                            <p><a href="#">Fashion</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/earbud.jpg" alt="Earbuds">
                            <p><a href="#">Sports</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" style="height:85%" src="./images/phone.jpg" alt="Smartphones">
                            <p><a href="#">Health & Beauty</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/powerbank.jpg" alt="Powerbanks">
                            <p style="margin-top: 30px;"><a href="#">Industrial Equipment</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/smartwatch.jpg" alt="Smart watches">
                            <p><a href="#">Home garden</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/smartwatch.jpg" alt="Smart watches">
                            <p><a href="#">Grocery & Pets</a></p>
                            </div>
                            <br>
                            <div class="btn-box">
                            <button class="seeall-btn">See all</button>
                        </div>
                        </div>

<!-- deals part -->
                        <div>
            <h2>Products</h2>
                        <div class="category-name">
                            <div class="image-style">
                                <img class="img-style" src="./images/camera.png" alt="Cameras">
                                <p><a href="#">Cameras</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/comb.jpg" alt="Combs">
                            <p><a href="#">Combs</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/earbud.jpg" alt="Earbuds">
                            <p><a href="#">Earbuds</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" style="height:85%" src="./images/phone.jpg" alt="Smartphones">
                            <p><a href="#">Smartphones</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/powerbank.jpg" alt="Powerbanks">
                            <p style="margin-top: 30px;"><a href="#">Powerbanks</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/smartwatch.jpg" alt="Smart watches">
                            <p><a href="#">Smart Watches</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/smartwatch.jpg" alt="Smart watches">
                            <p><a href="#">Smart Watches</a></p>
                            </div>
                            <br>
                            <div class="btn-box">
                            <button class="seeall-btn">See all</button>
                        </div>
                        </div>
                    
                                         
</body>
</html>

<?php
    }

else{
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
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php include "./header.php" ?>

    <!-- SLIDER -->
    <div class="slider-container">
  <div class="slider">
    <div class="slider-item">
      <img class="slider-img" src="./images/3.jpg" alt="Slider Image 1">
    </div>
    <div class="slider-item">
      <img class="slider-img" src="./images/3.jpg" alt="Slider Image 2">
    </div>
    <div class="slider-item">
      <img class="slider-img" src="./images/3.jpg" alt="Slider Image 3">
    </div>
  </div>
  <div class="slider-buttons"></div>
</div>

<!-- SLIDER FUNCTAIONALITY -->

<script>
  // Slider functionality
  const slider1 = document.querySelector('.slider');
  const sliderItems1 = Array.from(document.querySelectorAll('.slider-item'));
  const sliderButtonsContainer1 = document.querySelector('.slider-buttons');
  let currentSlide1 = 0;

  // Create slider buttons
  sliderItems.forEach((_, index) => {
    const button = document.createElement('div');
    button.classList.add('slider-button');
    if (index === currentSlide) {
      button.classList.add('active');
    }
    button.addEventListener('click', () => {
      goToSlide(index);
    });
    sliderButtonsContainer.appendChild(button);
  });

  // Auto slide every 3 seconds
  setInterval(() => {
    goToSlide((currentSlide + 1) % sliderItems.length);
  }, 3000);

  // Go to specific slide
  function goToSlide(index) {
    slider.style.transform = `translateX(-${index * 100}%)`;
    sliderButtonsContainer.querySelector('.active').classList.remove('active');
    sliderButtonsContainer.children[index].classList.add('active');
    currentSlide = index;
  }
</script>

            <div>
            <h2>Popular Categories</h2>

                        <div class="category-name">
                            <div class="image-style">
                                <img class="img-style" src="./images/camera.png" alt="Cameras">
                                <p><a href="#">Electronics</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/comb.jpg" alt="Combs">
                            <p><a href="#">Fashion</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/earbud.jpg" alt="Earbuds">
                            <p><a href="#">Sports</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" style="height:85%" src="./images/phone.jpg" alt="Smartphones">
                            <p><a href="#">Health & Beauty</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/powerbank.jpg" alt="Powerbanks">
                            <p style="margin-top: 30px;"><a href="#">Industrial Equipment</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/smartwatch.jpg" alt="Smart watches">
                            <p><a href="#">Home garden</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/smartwatch.jpg" alt="Smart watches">
                            <p><a href="#">Grocery & Pets</a></p>
                            </div>
                            <br>
                            <div class="btn-box">
                            <button class="seeall-btn">See all</button>
                        </div>
                        </div>

<!-- deals part -->
                        <div>
            <h2>Products</h2>
                        <div class="category-name">
                            <div class="image-style">
                                <img class="img-style" src="./images/camera.png" alt="Cameras">
                                <p><a href="#">Cameras</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/comb.jpg" alt="Combs">
                            <p><a href="#">Combs</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/earbud.jpg" alt="Earbuds">
                            <p><a href="#">Earbuds</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" style="height:85%" src="./images/phone.jpg" alt="Smartphones">
                            <p><a href="#">Smartphones</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/powerbank.jpg" alt="Powerbanks">
                            <p style="margin-top: 30px;"><a href="#">Powerbanks</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/smartwatch.jpg" alt="Smart watches">
                            <p><a href="#">Smart Watches</a></p>
                            </div>

                            <div class="image-style">
                            <img class="img-style" src="./images/smartwatch.jpg" alt="Smart watches">
                            <p><a href="#">Smart Watches</a></p>
                            </div>
                            <br>
                            <div class="btn-box">
                            <button class="seeall-btn">See all</button>
                        </div>
                        </div>
                    
                                         
</body>
</html>

<?php
}
?>


<!-- other php part begins here
php
} else {
?>
    html part goes here


    php
}
close here with php tags
-->

       