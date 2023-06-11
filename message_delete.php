<?php

    session_start();

    include './conn.php';

    if ($_SESSION['user_role'] == 'buyer') { 

            $id = $_GET['id'];

            $query = "DELETE FROM message WHERE message_ID = '$id'  LIMIT 1";

            $resultSet = $con->query($query);

            if ($resultSet) {
                echo  '<script>alert("Your Message Deleted"); window.location = "message.php"; </script>';
            } else {
                echo  '<script>alert("Message Delete Failed"); window.location = "message.php"; </script>';
            }
            
    } else {
        header('Location : login.php');
        exit();
    }

    $con->close();
?>

<!--reference: W3Schools-->