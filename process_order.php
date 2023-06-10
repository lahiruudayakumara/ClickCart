<?php

  require "./conn.php";

  session_start();

  $bId = $_SESSION['buyer_ID'];

if (isset($_POST['place_order'])) {

  $productID = $_GET['pId'];
  $deliveryAddress = $_POST['delivery_address'];
  $quantity = $_POST['qty'];
  $billingAddress = $_POST['billing_address'];
  $buyerEmail = $_POST['buyer_email'];
  $paymentMethod = $_POST['payment_method'];

  $sql = "INSERT INTO place_order (place_id, buyer_ID, product_ID, quantity, total_price, shipping_address, billing_address, email, payment_method) 
  VALUES ( '', '{$bId }', '{$productID}', '{$quantity}', '50', '{$deliveryAddress}',  '{$billingAddress}', '{$buyerEmail}', '{ $paymentMethod}')";
  if($con->query($sql)) {
    echo "Order placed successfully!";
  }


  
}
?>
