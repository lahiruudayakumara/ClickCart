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
            <a href="./helpcenter.php"><i>Help Center</i></a>
            <a href="#"><i>Daily Deals</i></a>
            <?php 
                if(isset($_SESSION['user_role'])) {
                    ?>
                    <a href="logout.php"><i>Logout</i></a>
                    <?php                        
                } else {
                    ?>
                    <a href="login.php"><i>Login</i></a>
                    <a href="create_account.php"><i>Sign Up</i></a>
                <?php
                }
            ?>

        </div>
    </section>

    <header id="header">
        <section class="nav-top-section">
        <div class="nav-top-bar">
            <div class="search">
                <div class="logo">
                    <a href="#">
                        <img src="./images/logo.png" alt="place-holder"/>
                    </a>
                </div>
                <form action="search.php" id="searchform" method="GET">
                    <input class="search-input" name="query"  type="text" placeholder="Search..">
                    <button type="submit">Search</button>
                </form>
                <div class="dropdown">
                    <span>All Categories<i class="fa-solid fa-chevron-down"></i></span>
                    <div class="dropdown-content">
                    <?php
                        $queryCategory = "SELECT *FROM category";
                        $resultCategory = $con->query($queryCategory);

                        while($row = $resultCategory->fetch_assoc()) {
                            ?>
                            <a href="category_view.php?category=<?php echo $row['category_Name']; ?>"><?php echo $row['category_Name']; ?></a>
                            <?php
                        }
                    ?>
                    </div>                    
                </div>
                <div class="sbtn">
                    <a href="store.php" ><i class="fa-solid fa-shop"></i></a>
                    <a href="add_to_cart.php" ><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    <a href="#" ><i class="fa-regular fa-bell"></i></a>
                </div>
            </div>
        </div>
        </section>

        <div class="nav-bottom-bar">
            <ul>
                <a href="./index.php">Home</a>
                <a href="category_view.php?category=Electronics" >Electronics</a>
                <a href="category_view.php?category=Fashion">Fashion</a>
                <a href="category_view.php?category=Sports">Sports</a>
                <a href="category_view.php?category=Health and Beauty">Health & Beauty</a>
                <a href="category_view.php?category=Industrial Equpment">Industrial Equpment</a>
                <a href="category_view.php?category=Home Garden">Home Garden</a>
                <a href="category_view.php?category=Grocery and Pets">Grocery & Pets</a>
            </ul>
        </div>
    </header> 
</body>
</html>