<?php
include 'includes/connection.php';

// Read Rental Status
$stmt = $conn->query("SELECT * FROM Rental_Status");
$rentalStatuses = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rentalStatuses as $rentalStatus) {
    echo "<tr>";
    echo "<td>" . $rentalStatus['RentalStatusID'] . "</td>";
    echo "<td>" . $rentalStatus['RentalStatusName'] . "</td>";
    echo "<td>";
    echo "<a href='rental_status_edit.php?id=" . $rentalStatus['RentalStatusID'] . "'>Edit</a>";
    echo "<a href='rental_status_delete.php?id=" . $rentalStatus['RentalStatusID'] . "'>Delete</a>";
    echo "</td>";
    echo "</tr>";
}
?>
