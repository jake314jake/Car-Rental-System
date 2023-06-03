<?php
include 'includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $statusName = $_POST['status_name'];

    // Insert the new rental status into the database
    $stmt = $conn->prepare("INSERT INTO Rental_Status (RentalStatusName) VALUES (?)");
    $stmt->execute([$statusName]);

    // Redirect back to the rental_status_index.php page after creating the rental status
    header("Location: rental_status_index.php");
    exit;
}
?>
