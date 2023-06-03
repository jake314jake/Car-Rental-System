<?php
include 'includes/connection.php';

// Check if the loyalty program discount ID is provided
if (isset($_GET['id'])) {
    $loyaltyProgramID = $_GET['id'];

    // Delete the loyalty program discount record from the database
    $stmt = $conn->prepare("DELETE FROM Loyalty_Program_Discount WHERE LoyaltyProgramID = ?");
    $stmt->execute([$loyaltyProgramID]);

    // Redirect back to the loyalty_program_discount_index.php page after deleting the loyalty program discount
    header("Location: loyalty_program_discount_index.php");
    exit;
} else {
    // Loyalty program discount ID not provided, handle the error or redirect to an error page
    // For simplicity, we'll redirect back to the loyalty_program_discount_index.php page
    header("Location: loyalty_program_discount_index.php");
    exit;
}
