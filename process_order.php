<?php

if (isset($_POST['place_order'])) {

  $productID = $_POST['product_id'];
  $deliveryAddress = $_POST['shipping_address'];
  $quantity = $_POST['quantity'];
  $billingAddress = $_POST['billing_address'];
  $buyerEmail = $_POST['email'];
  $paymentMethod = $_POST['payment_method'];

  $sql = "INSERT INTO place_order (product_id, delivery_address, billing_address, buyer_email, payment_method) VALUES (?, ?, ?, ?, ?)";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("sssss", $productID, $deliveryAddress, $quantity, $billingAddress, $buyerEmail, $paymentMethod);
  $stmt->execute();

  echo "Order placed successfully!";
}
?>
