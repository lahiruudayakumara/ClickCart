<?php
require './conn.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // $qty = $_POST['quantity'];
    $cartId = $_POST['cart'];
    echo $cartId;
    
}
 $con->close(); 
 
 ?>