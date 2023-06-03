<?php
include 'includes/connection.php';

// Check if the car status ID is provided
if (isset($_GET['id'])) {
    $carStatusID = $_GET['id'];

    // Delete the car status record from the database
    $stmt = $conn->prepare("DELETE FROM Car_Status WHERE CarStatusID = ?");
    $stmt->execute([$carStatusID]);
}

// Redirect back to the car_status_read.php page after deleting the car status
header("Location: car_status_read.php");
exit;
?>
