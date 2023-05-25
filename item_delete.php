<?php

session_start();

    include './conn.php';

if (isset($_SESSION['logged_in'])) { 


        $id = 1;

        $query2 = "DELETE FROM p WHERE P_ID = '2' LIMIT 1";

        $result_set = mysqli_query($con, $query2);

        if ($result_set) {
            echo  '<script>alert("Your Product Item Deleted"); window.location = "seller_dashboard.php"; </script>';
        } else {
           // echo  '<script>alert("News Delete Fail"); window.location = "seller_dashboard.php"; </script>';
        }
    }




?>