<?php
include 'includes/connection.php';

// Check if the rental agency ID is provided
if (isset($_GET['id'])) {
    $agencyID = $_GET['id'];

    // Delete the rental agency record from the database
    $stmt = $conn->prepare("DELETE FROM Rental_Agency WHERE AgencyID = ?");
    $stmt->execute([$agencyID]);

    // Redirect back to the rental_agency_read.php page after deleting the rental agency
    header("Location: rental_agency_read.php");
    exit;
} else {
    // Rental agency ID not provided, handle the error or redirect to an error page
    // For simplicity, we'll redirect back to the rental_agency_read.php page
    header("Location: rental_agency_read.php");
    exit;
}
?>
