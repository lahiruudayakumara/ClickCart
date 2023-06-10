<?php
require './conn.php';

if (isset($_POST['delete'])) {
    // Seller ID to delete
    $sellerId = 'seller_ID';

    // Check for referencing records
    $sqlMessages = "SELECT COUNT(*) FROM messages WHERE seller_ID = ?";
    $sqlProducts = "SELECT COUNT(*) FROM product WHERE seller_ID = ?";
    $sqlRatings = "SELECT COUNT(*) FROM rating WHERE seller_ID = ?";
    $sqlOrderItems = "SELECT COUNT(*) FROM order_items WHERE seller_ID = ?";

    $stmtMessages = $con->prepare($sqlMessages);
    $stmtProducts = $con->prepare($sqlProducts);
    $stmtRatings = $con->prepare($sqlRatings);
    $stmtOrderItems = $con->prepare($sqlOrderItems);

    $stmtMessages->bind_param("s", $sellerId);
    $stmtProducts->bind_param("s", $sellerId);
    $stmtRatings->bind_param("s", $sellerId);
    $stmtOrderItems->bind_param("s", $sellerId);

    $stmtMessages->execute();
    $stmtProducts->execute();
    $stmtRatings->execute();
    $stmtOrderItems->execute();

    $resultMessages = $stmtMessages->get_result();
    $resultProducts = $stmtProducts->get_result();
    $resultRatings = $stmtRatings->get_result();
    $resultOrderItems = $stmtOrderItems->get_result();

    $numMessages = $resultMessages->fetch_row()[0];
    $numProducts = $resultProducts->fetch_row()[0];
    $numRatings = $resultRatings->fetch_row()[0];
    $numOrderItems = $resultOrderItems->fetch_row()[0];

    if ($numMessages > 0 || $numProducts > 0 || $numRatings > 0 || $numOrderItems > 0) {
        echo "Cannot delete the account. There are referencing records in other tables.";
    } else {
        // Delete referencing records
        $sqlDeleteMessages = "DELETE FROM messages WHERE seller_ID = ?";
        $sqlDeleteProducts = "DELETE FROM product WHERE seller_ID = ?";
        $sqlDeleteRatings = "DELETE FROM rating WHERE seller_ID = ?";
        $sqlDeleteOrderItems = "DELETE FROM order_items WHERE seller_ID = ?";

        $stmtDeleteMessages = $con->prepare($sqlDeleteMessages);
        $stmtDeleteProducts = $con->prepare($sqlDeleteProducts);
        $stmtDeleteRatings = $con->prepare($sqlDeleteRatings);
        $stmtDeleteOrderItems = $con->prepare($sqlDeleteOrderItems);

        $stmtDeleteMessages->bind_param("s", $sellerId);
        $stmtDeleteProducts->bind_param("s", $sellerId);
        $stmtDeleteRatings->bind_param("s", $sellerId);
        $stmtDeleteOrderItems->bind_param("s", $sellerId);

        $stmtDeleteMessages->execute();
        $stmtDeleteProducts->execute();
        $stmtDeleteRatings->execute();
        $stmtDeleteOrderItems->execute();

        // Delete the seller record
        $sqlDeleteSeller = "DELETE FROM seller WHERE seller_ID = ?";
        $stmtDeleteSeller = $con->prepare($sqlDeleteSeller);
        $stmtDeleteSeller->bind_param("s", $sellerId);
        $stmtDeleteSeller->execute();

        echo "Account deleted successfully.";
    }

    // Close connections
    $stmtMessages->close();
    $stmtProducts->close();
    $stmtRatings->close();
    $stmtOrderItems->close();

    $stmtDeleteMessages->close();
    $stmtDeleteProducts->close();
    $stmtDeleteRatings->close();
    $stmtDeleteOrderItems->close();
    $stmtDeleteSeller->close();
    $con->close();
}
?>
