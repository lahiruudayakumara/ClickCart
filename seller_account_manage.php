<?php 
    require './conn.php';
    
    session_start();

    if ($_SESSION['user_role'] == "seller" ) {

        

        $seller_ID = $_SESSION['seller_ID'];
 
        $sql = "SELECT *FROM seller WHERE seller_ID = '$seller_ID' ";

        $result = $con->query($sql);

        $info = $result->fetch_assoc();


        if(isset($_POST['update'])){
            $sellerName = $_POST['name'];
            $sellerLocation = $_POST['location'];
            $sellerEmail = $_POST['s_email'];
            $sellerPassword = $_POST['s_password'];

            $sql2 = "UPDATE seller SET seller_Name = '$sellerName', location = '$sellerLocation', 
            email = '$sellerEmail', password = '$sellerPassword' WHERE seller_ID = '$seller_ID' ";

           if($con->query($sql2)) {
            echo " <script> alert('Updated successfully!'); window.location = 'seller_dashboard.php';</script>";
           } else {
            echo " <script> alert('Update unsuccessful'); window.location = 'seller_dashboard.php';</script>";
           }
        }

        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Click Cart</title>
            <link href="./images/ico.png" rel="icon" type="image/png" />
            <link rel="stylesheet" href="./css/style.css">
            <link rel="stylesheet" href="./css/seller_account_manage.css">
            <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        </head>

        <body>

            <div class="main-section">
                <div class="row">
                <div class="row-personal-info">
                    <form action="#" method="POST">
                    <div class="personal-info-form">
                    <center>
                    <h2>Personal Information</h2><br>
                    <img src="./images/avatar.jpg" style="width:100px; height:100px; margin-bottom: 20px;"></br>
                    </center>
                    <label>Seller name:</label><br>
                    <input type="text" name="name" value="<?php echo "{$info['seller_Name']}" ?>"><br><br>

                    <label>Location:</label><br>
                    <input type="text" name="location" value="<?php echo "{$info['location']}" ?>"><br><br>
                    
                    <label>Email:</label><br>
                    <input type="text" name="s_email" value="<?php echo "{$info['email']}" ?> "><br><br>
                    
                    <label>Password:</label><br>
                    <input type="password" id ="myInput" name="s_password" value="<?php echo "{$info['password']}" ?> "><br>
                    <div>
                    <input id="passCheck" type="checkbox" onclick="myFunction()">Show Password
                    <script>
                        function myFunction() {
                        var x = document.getElementById("myInput");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                        }
                    </script>
                    </div>
                    <br>
                    
                    <!-- ----------------------Account delete process------------------- -->
                    <form class="account-delete" action="delete_account.php" method="POST">
                        <a href="./delete_account.php?sId=<?php echo $seller_ID; ?>">
                    <input style="background-color:red; color:white; cursor:pointer;" type="button" name="delete" value="Delete Account?">
                    </a>


                    
                    <br><br>
                    <input class="btn" type="submit" value="Update"name="update">
                        </form>

                    <button class="btn" type="button"  onclick="window.location = 'seller_dashboard.php'">Cancel</button>
                    
                    </div>
    </div>

            </div>
        </body>
        </html>

<?php
    } else {
        header("Location: login.php");
    }
    $con->close();
?>
