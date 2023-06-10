<?php

	session_start();

	require './conn.php';

	if ($_SESSION['user_role'] == "buyer" ) { 
        $bID = $_SESSION['buyer_ID'];
        $pID = $_GET['pId'];
        $qty = $_GET['quantity'];
        $price = $_GET['price'];


        $query = "INSERT INTO cart(cart_ID, buyer_ID, product_ID, quantity, price) VALUES ('', '{$bID}', '{$pID}', '{$qty}', '{$price}')"; 
        if($con->query($query)) {
            echo "<script>alert('Product add to Cart'); window.location = 'index.php';</script>";
        } else {
            echo "<script>alert('This time Can not Product add to Cart! please try again'); window.location = 'index.php';</script>";
        }

    } else {
        header('Location: login.php');
        exit();
    }
    $con->close();
?>