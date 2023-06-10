<?php

    session_start();

    include './conn.php';

    if ($_SESSION['user_role'] == 'seller') { 


            $id = $_GET['id'];

            $query2 = "DELETE FROM product WHERE product_ID = '$id'  LIMIT 1";

            $result_set = $con->query($query2);

            if ($result_set) {
                echo  '<script>alert("Your Product deleted."); window.location = "seller_dashboard.php"; </script>';
            } else {
               echo  '<script>alert("Product cannot be deleted. There are pending orders."); window.location = "seller_dashboard.php"; </script>';
            }
    } else {
        header('Location : login.php');
        exit();
    }

    $con->close();
?>