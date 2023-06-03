<?php
include 'includes/connection.php';

// Check if the loyalty program ID is provided
if (isset($_GET['id'])) {
    $loyaltyProgramID = $_GET['id'];

    // Delete the loyalty program from the database
    $stmt = $conn->prepare("DELETE FROM Loyalty_Program WHERE LoyaltyProgramID = ?");
    $stmt->execute([$loyaltyProgramID]);

    // Redirect back to the loyalty_program_index.php page after deleting the loyalty program
    header("Location: loyalty_program_index.php");
    exit;
} else {
    // Loyalty program ID not provided, handle the error or redirect to an error page
    // For simplicity, we'll redirect back to the loyalty_program_index.php page
    header("Location: loyalty_program_index.php");
    exit;
}
?>
