<?php require './conn.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Cart</title>
    <link rel="stylesheet" href="./css/buyer_account_manage.css">
    <link rel="stylesheet" href="./css/createAccount.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
         include "./header.php"
    ?>
    <h1> User name</h1><br>

    <div class="row">
        <div class="column" style="background-color:#f2f2f2;">
    <form action="/action.php" method="post">
        <fieldset>
            <legend>Personal Information</legend><br>
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname" value="Binuki"><br><br>
            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname" value="Mihara"><br><br>
            <label for ="bday">Birthday:</label><br>
            <input type="date" id="bday" name="bday"><br><br>
            <label for="address">Address:</label><br>
            <textarea id="address" name="address">No.113, Chatham road, Sydney, Australia</textarea><br><br>
            <input type="submit" value="Update">
            <input type="reset" value="Reset"><br><br>
        </fieldset>
    </form>
        </div>

        <div class="column" style="background-color:#f2f2f2;">
    <form action="/action.php" method="post">
        <fieldset>
            <legend>Payment Information</legend><br>
            <label for="paymethod">Payment Method</label><br><br>
            <i class="fa-brands fa-cc-visa" aria-hidden="true"></i>
            <a href="https://courseweb.sliit.lk/">Edit  Delete</a><br><br>
            <i class="fa-brands fa-cc-mastercard"></i>
            <a href="https://courseweb.sliit.lk/">Edit  Delete</a><br><br>
            <i class="fa-brands fa-cc-paypal" aria-hidden="true"></i>
            <a href="https://courseweb.sliit.lk/">Edit  Delete</a><br><br>
            <a href="https://courseweb.sliit.lk/">Add Other Method</a><br><br>
        </fieldset>
    </form>
        </div>    
    
        <div class="column" style="background-color:#f2f2f2;">
    <form action="/action.php" method="post">
        <fieldset>
            <legend>Password & Security</legend><br>
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" placeholder="name@gmail.com"><br><br>
            <label for="password">Password</label><br>
            <input type="text" id="password" name="password" placeholder="Enter the password">
            <i class="fa-brands fa fa-eye"aria-hidden="true"></i>
            <a href="https://courseweb.sliit.lk/">Change</a><br><br>
        </fieldset>
    </form>
        </div><br><br><br><br>      
</div>

    <?php include "./footer.php" ?>


    
</body>    
</html> 
<?php $con->close(); ?>