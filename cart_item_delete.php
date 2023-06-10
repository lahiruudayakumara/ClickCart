<?php

    session_start();

    include './conn.php';

    if ($_SESSION['user_role'] == 'buyer') { 


            $id = $_GET['cId'];

            $query2 = "DELETE FROM cart WHERE cart_ID = '$id'  LIMIT 1";

            $result_set = $con->query($query2);

            if ($result_set) {
                echo  '<script>alert("Cart Item deleted."); window.location = "add_to_cart.php"; </script>';
            } else {
               echo  '<script>alert("Cart item cannot be deleted now. Try again"); window.location = "add_to_cart.php"; </script>';
            }
    } else {
        header('Location : login.php');
        exit();
    }

    $con->close();
?>