<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Cart</title>
    <link rel="stylesheet" href="./css/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <section class="topbar">
        <div class="container-top-bar">
            <a href="#"><i>Contact Us</i></a>
            <a href="#"><i>Help Center</i></a>
            <a href="#"><i>Daily Deals</i></a>
            <?php 
                $login = 1;
                if ($login = 1) {
            ?>
                <a href="#"><i>Login</i></a>
                <a href="#"><i>Sign Up</i></a>
            <?php
                }
            ?>
        </div>
    </section>

    <header id="header">
        <section class="nav-top-section">
        <div class="nav-top-bar">
            <div class="logo">
                <a href="#">
                    <img src="./images/logo.png" alt="place-holder"/>
                </a>
            </div>
            <div class="search">
                <input type="text" placeholder="Search..">
                <button>Search</button>
                <div class="dropdown">
                    <span>All Categories<i class="fa-solid fa-chevron-down"></i></span>
                    <div class="dropdown-content">
                        <a href="#">Electronics</a>
                        <a href="#">Electronics</a>
                    </div>                    
                </div>
                <div class="sbtn">
                    <a href="#" ><i class="fa-solid fa-shop"></i></a>
                    <a href="#" ><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    <a href="#" ><i class="fa-regular fa-bell"></i></a>
                </div>
            </div>
        </div>
        </section>

        <div class="nav-bottom-bar">
            <ul>
                <a href="#">Home</a>
                <a href="#">Electronics</a>
                <a href="#">Fashion</a>
                <a href="#">Sports</a>
                <a href="#">Health & Beauty</a>
                <a href="#">Industrial Equpment</a>
                <a href="#">Home Garden</a>
                <a href="#">Grocery & Pets</a>
            </ul>
        </div>
        
    </header> 
</body>
</html>