<?php
include 'includes/connection.php';

// Check if the customer ID is provided
if (isset($_GET['id'])) {
    $customerID = $_GET['id'];

    // Delete the customer from the database
    $stmt = $conn->prepare("DELETE FROM Customer WHERE CustomerID = ?");
    $stmt->execute([$customerID]);
}

// Redirect back to the index page after deleting the customer
header("Location: index.html");
exit;
?>
