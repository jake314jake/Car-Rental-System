<?php
include 'includes/connection.php';

// Check if the rental status ID is provided
if (isset($_GET['id'])) {
    $statusID = $_GET['id'];

    // Delete the rental status record from the database
    $stmt = $conn->prepare("DELETE FROM Rental_Status WHERE RentalStatusID = ?");
    $stmt->execute([$statusID]);

    // Redirect back to the rental_status_index.php page after deleting the rental status
    header("Location: rental_status_index.php");
    exit;
} else {
    // Rental status ID not provided, handle the error or redirect to an error page
    // For simplicity, we'll redirect back to the rental_status_index.php page
    header("Location: rental_status_index.php");
    exit;
}
?>
