<?php 
    require './conn.php';

    session_start();

    if ($_SESSION['user_role'] == "seller" ) {
        $sellerID = $_SESSION['seller_ID'];
        echo "hello" . $sellerID;



    } else {
        header("Location: login.php");
    }
?>