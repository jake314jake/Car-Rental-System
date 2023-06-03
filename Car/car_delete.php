<?php
include 'includes/connection.php';

// Check if the car ID is provided
if (isset($_GET['id'])) {
    $carID = $_GET['id'];

    // Delete the car from the database
    $stmt = $conn->prepare("DELETE FROM Car WHERE CarID = ?");
    $stmt->execute([$carID]);

    // Redirect back to the car_index.php page after deleting the car
    header("Location: car_index.php");
    exit;
} else {
    // Car ID not provided, handle the error or redirect to an error page
    // For simplicity, we'll redirect back to the car_index.php page
    header("Location: car_index.php");
    exit;
}
?>
