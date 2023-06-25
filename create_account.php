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
    <link rel="stylesheet" href="./css/createAccount.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript">
    function showBuyerContainer() {
      var formContainer = document.getElementById("buyer");
      formContainer.classList.add("show");
      var formContainer2 = document.getElementById("seller");
      formContainer2.classList.remove("show");
    }
    
    function showSellerContainer() {
      var formContainer = document.getElementById("buyer");
      formContainer.classList.remove("show");
      var formContainer2 = document.getElementById("seller");
      formContainer2.classList.add("show");
    }

    </script>
</head>
<body onload="showBuyerContainer()">
    <?php include "./header.php" ?>


    <div class="chooseContainer">
        <h2>Create an Account</h2>
        <label>
            <input type="radio" name="radioButton" onclick="showBuyerContainer()" checked>Buyer Account
        </label>
  
        <label>
            <input type="radio" name="radioButton" onclick="showSellerContainer()">Seller Account
        </label>
    </div>

<div style="height: auto;">
    <div id="buyer" class="buyer">
        <form action="create_buyer_account.php" method="post">
            <input class="firstName" type="text" name="firstName" placeholder="First Name" required/>
            <input class="lastName" type="text" name="lastName" placeholder="Last Name" required/><br>
            <textarea id="address" name="address" rows="5" placeholder="Address"></textarea>
            <input id="email" type="email" name="email" placeholder="Email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required/></br>
            <input id="password" type="password" name="password" placeholder="Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$" required/><br/>
            <p>By creating Account, You agree to our <a href="./useragreement.php">user agrement</a> and <a href="./privacy.php">Privacy Policy.</a></p>
            <input id="submit" type="submit" name="submit" placeholder="Create Account" value="Create Account"/>
            <p align="center">Already a member? <a href="./login.php">Sign in</a> </p>
        </form>
        <button id="button" type="submit" class="facebook" onclick="alertmessage()"><i class="fa-brands fa-facebook-f"></i> Facebook</button>
        <button id="button"  type="submit" class="twitter" onclick="alertmessage()"><i class="fa-brands fa-twitter"></i> Twitter</button>
        <button id="button" type="submit" class="apple" onclick="alertmessage()"><i class="fa-brands fa-apple" aria-hidden="true"></i> Twitter</button>
    </div>



    <!-- Creating a seller account -->
    <div id="seller" class="seller">
        <form action="create_seller_account.php" method="post">
            <input class="userName" type="text" name="userName" placeholder="Seller Name or Business Name" required/>
              <select name="location" id="location">
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="India">India</option>
                <option value="United state of America">United state of America</option>
                <option value="German">German</option>
                <option value="Canada">Canada</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Brazil">Barzil</option>
                <option value="Russia">Russia</option>
                <option value="Pakistan">Pakisthan</option>
                <option value="China">China</option>
              </select>
            <input id="email" type="email" name="email" placeholder="Email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" autocomplete="no-referrer" required/><br/>
            <input id="password" type="password" name="password" placeholder="Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$" required/>
            <p>By creating Account, You agree to our <a href="./useragreement.php">user agrement</a> and <a href="./privacy.php">Privacy Policy.</a></p>
            <input id="submit" type="submit" name="submit" placeholder="Create Account" value="Create Account" style="width:98%">
        </form>
    </div>
</div>
<script type="text/javascript">
    function alertmessage() {
        alert('This function is not working Now. Please Try again later or you cann create account using your details');
    }
</script>

    <?php include "./footer.php" ?> 

</body>
</html>
<?php
    $con->close();
?>