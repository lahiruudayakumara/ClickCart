<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "clickcart";

// Create connection

    $con = mysqli_connect($servername, $username, $password, $db);
// Check connection

    if (mysqli_connect_error()) {
        die("Connection failed: " . $con->connect_error);
    }
    echo "<script>console.log('Database Connect Successful')</script>";

?>
