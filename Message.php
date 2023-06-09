<?php require './conn.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sender']) && isset($_POST['recipient']) && isset($_POST['subject']) && isset($_POST['message'])) {
        $sender = $_POST['sender'];
        $recipient = $_POST['recipient'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $sql = "INSERT INTO messages (sender, recipient, subject, message) VALUES ('$sender', '$recipient', '$subject', '$message')";

        if ($con->query($sql) === TRUE) {
            echo "Message created successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}


$sql = "SELECT message.*, buyer.*, seller.* 
        FROM message
        JOIN buyer ON message.buyer_ID = buyer.buyer_ID
        JOIN seller ON message.seller_ID = seller.seller_ID
        "; 

    $result = $con->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Cart</title>
    <link rel="stylesheet" href="./css/createAccount.css">
    <link rel="stylesheet" href="./css/message.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Oswald:wght@200&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
         include "./header.php"
    ?>
    <div style="width: 90%;margin-top:40px; margin-left:auto; margin-right:auto; border: 1px solid grey; display: flex; flex-wrap: wrap; position:relative;">
        <div style="width:20%; border: 1px solid grey;" class="groove1">
            <p style="margin-left: 20px; padding: 5px;">
            <a href="#">Inbox</a><br><br>
            <a href="#">Spam</a><br><br>
            <a href="#">ClickCart</a><br><br>
            <a href="#">Sent</a><br><br>
            <a href="#">Trash</a><br><br>
            <a href="#">Archieve</a><br><br>
            </p>
        </div>
        <div id="name" style="width:80%; padding: 5px 2px;">
            <button onclick="document.location='default.asp'">New</button>
            <button onclick="document.location='default.asp'">Delete</button>
            <form class="example" action="/action_page.php" style="margin:auto;max-width:300px display: inline-block;" >
                    <input type="text" placeholder="Search.." name="search2" style="display: inline-block;">
                    <button type="submit" style="display: inline; border-radius: 5px; margin-left: 2px; height:42px; width:10%;"><i class="fa fa-search"></i></button>
            </form>
            <a href="https://courseweb.sliit.lk/">All</a>
            <span>||</span>
            <a href="https://courseweb.sliit.lk/">Unread</a>
            <p class="heading"><span style="float:left; ">From</span> <span>Subject</span> <span style="float:right;">Received</span></p>
            <div>
                <form action="/action_page.php" style="display: inline;" class="detail" >
                    <?php
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    
 ?>
 <input type="checkbox" id="vehicle1">
                    <p style="display: inline;">
                        <span><?php echo $row['seller_Name']; ?></span> 
                        <span style="float:center;max-width:100px;"><?php echo $row['subject']; ?></span>
                        <span style="float:center;max-width:100px;"><?php echo substr($row['message'], 0, 50); ?></span> 
                        <span style="float:right;"><?php echo $row['timestamp']; ?></span>
                    </p><br/>
                    <?php
                }
                } else {
                    echo "No messages found.";
                }
                ?>
                </form>
            </div>
            <!-- Message Creation Form -->

        </div>
        <!-- Display Messages -->
            <div>

            </div>

    </div>


   <?php 
         include "./footer.php" 
    ?>   

    <script src="./js/check_online.js"></script>

</body>
</html>
<?php $con->close(); ?>