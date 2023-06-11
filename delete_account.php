<?php
    require './conn.php';

    // Seller ID to delete
    $sellerId = $_GET['sId'];

    // Check for referencing records
    $sqlProducts = "SELECT COUNT(*) FROM product WHERE seller_ID = '$sellerId'";
    $sqlRatings = "SELECT COUNT(*) FROM rating WHERE seller_ID = '$sellerId'";

    $resultProducts = $con->query($sqlProducts);
    $resultRatings = $con->query($sqlRatings);

    $numProducts = $resultProducts->fetch_row()[0];
    $numRatings = $resultRatings->fetch_row()[0];


    if ($numProducts > 0 || $numRatings > 0 || $numOrderItems > 0) {
        echo "<script>alert('Cannot delete the account. There are pending orders.'); window.location = 'seller_dashboard.php';</script>";
    } else {
        // Delete the seller record
        $sqlDeleteSeller = "DELETE FROM seller WHERE seller_ID = '$sellerId' LIMIT 1";
        $con->query($sqlDeleteSeller);

        echo "<script>alert('Account deleted successfully.'); window.location = 'logout.php';</script>";
    }
    
    $con->close();

?>
