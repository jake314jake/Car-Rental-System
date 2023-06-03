<?php
include 'includes/connection.php';

// Check if the payment ID is provided
if (isset($_GET['id'])) {
    $paymentID = $_GET['id'];

    // Delete the payment from the database
    $stmt = $conn->prepare("DELETE FROM Payment WHERE PaymentID = ?");
    $stmt->execute([$paymentID]);

    // Redirect back to the payment_index.php page after deleting the payment
    header("Location: payment_index.php");
    exit;
} else {
    // Payment ID not provided, handle the error or redirect to an error page
    // For simplicity, we'll redirect back to the payment_index.php page
    header("Location: payment_index.php");
    exit;
}
