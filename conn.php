<?php

// Create connection

    $con = new mysqli("localhost", "root", "", "Clickcart");

// Check connection

    if ($con->connect_error){
        die("Connection failed: " . $con->connect_error);
    } else {
        echo "<script>console.log('Database Connect Successful')</script>";
    }
    
?>
