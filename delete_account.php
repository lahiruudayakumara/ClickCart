<?php
    require './conn.php';

    // Seller ID to delete
    $sellerId = $_GET['sId'];

    // Check for referencing records
    $sqlProducts = "SELECT COUNT(*) FROM product WHERE seller_ID = '$sellerId'";
    $sqlRatings = "SELECT COUNT(*) FROM rating WHERE seller_ID = '$sellerId'";
    $sqlOrderItems = "SELECT COUNT(*) FROM order_items WHERE seller_ID = '$sellerId'";

    $resultProducts = $con->query($sqlProducts);
    $resultRatings = $con->query($sqlRatings);
    $resultOrderItems = $con->query($sqlOrderItems);

    $numProducts = $resultProducts->fetch_row()[0];
    $numRatings = $resultRatings->fetch_row()[0];
    $numOrderItems = $resultOrderItems->fetch_row()[0];

    if ($numProducts > 0 || $numRatings > 0 || $numOrderItems > 0) {
        echo "<script>alert('Cannot delete the seller. There are referencing records in other tables.'); window.location = 'seller_dashboard.php';</script>";
    } else {
        // Delete referencing records
        $sqlDeleteProducts = "DELETE FROM product WHERE seller_ID = '$sellerId'";
        $sqlDeleteRatings = "DELETE FROM rating WHERE seller_ID = '$sellerId'";
        $sqlDeleteOrderItems = "DELETE FROM order_items WHERE seller_ID = '$sellerId'";

        $con->query($sqlDeleteProducts);
        $con->query($sqlDeleteRatings);
        $con->query($sqlDeleteOrderItems);

        // Delete the seller record
        $sqlDeleteSeller = "DELETE FROM seller WHERE seller_ID = '$sellerId' LIMIT 1";
        $con->query($sqlDeleteSeller);

        echo "<script>alert('Seller record deleted successfully.'); window.location = 'seller_dashboard.php';</script>";
    }
    $con->close();

?>
