<?php 

    require './conn.php'; 

    session_start();

    if($_SESSION['user_role'] == 'buyer') {
        $bID = $_SESSION['buyer_ID'];

        if (isset($_POST['submit'])) {
            $rec = $_POST['recipient'];
            $sub = $_POST['subject'];
            $msg = $_POST['message'];

            $query = "INSERT INTO message VALUES('', '{$rec}', '{$bID}', '{$sub}', '{$msg}', current_timestamp(), 'buyer') ";

            if($con->query($query)) {
                echo  "<script>alert('Message send sucessfully'); window.location = 'Message.php';</script>";
            }
            else {
                echo  '<script>alert("Message send Failed"); window.location = "message.php"; </script>';
            }
        
            
        }


        $sql = "SELECT message.*, buyer.*, seller.* 
                FROM message
                JOIN buyer ON message.buyer_ID = buyer.buyer_ID
                JOIN seller ON message.seller_ID = seller.seller_ID
                WHERE sender_role = 'buyer'
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

    <div id="newMessage">
        <h2>New Message</h2>
        <!-- Message Creation Form -->
        <form method="POST" action="Message.php">
            <select name="recipient" id="reciver" class="reciver">
                <option value="">-- Select Seller --</option>
                <?php
                    $querySeller = "SELECT * FROM seller";
                    $resultSeller = $con->query($querySeller);
                    while($row = $resultSeller->fetch_assoc()) {
                 ?>
                <option value="<?php echo $row['seller_ID'] ?>"><?php echo $row['seller_Name'] ?></option>
                <?php } ?>
            </select>
            <input type="text" name="subject" placeholder="Subject">
            <textarea name="message" placeholder="Message"></textarea>
            <button  type="submit" name="submit">Create Message</button>
            <button type="button" onclick="hide()">Close</button>
        </form>
    </div>

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
            <button onclick="show()">New</button>

            <form class="example" action="Message.php" style="margin:auto;max-width:300px; display: inline-block;" >
                    <input type="text" placeholder="Search.." name="search2" style="display: inline-block;">
                    <button type="submit" style="display: inline; border-radius: 5px; margin-left: 2px; height:42px; width:10%;"><i class="fa fa-search"></i></button>
            </form>
            
            <a href="https://courseweb.sliit.lk/">All</a>
            <span>||</span>
            <a href="https://courseweb.sliit.lk/">Unread</a>
            <hr>

            <table style="width:100%; text-align: center;" >
                <tr>
                    <th></th>
                    <th>From</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Recived</th>
                </tr>
            

            <div>
                <form action="Message.php" style="display: inline;" class="detail" >

                <?php
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                 ?> 
                 <tr>
                    <td><a href="message_delete.php?id=<?php echo $row['message_ID']; ?>"><button type="button">Delete</button></a></td>
                    <td><?php echo $row['seller_Name']; ?></td>
                    <td><?php echo $row['subject']; ?></td>
                    <td align="left"><?php echo substr($row['message'], 0, 50); ?></td>
                    <td><?php echo $row['timestamp']; ?></td>
                 </tr>


                <?php
                }
                } else {
                    echo "No messages found.";
                }
                ?>
                </form>
            </div>
            </table>
        </div>
    </div>


   <?php 
         include "./footer.php" 
    ?>   

    <script src="./js/check_online.js"></script>
    <script src="./js/message.js"></script>

</body>
</html>
<?php 
    } else {
        header('Location: login.php');
        exit();
    }
$con->close();
 ?>
 
 <!--reference: W3Schools-->