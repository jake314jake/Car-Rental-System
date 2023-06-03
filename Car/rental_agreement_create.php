<?php
include 'includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerID = $_POST['customer_id'];
    $carID = $_POST['car_id'];
    $rentalStatusID = $_POST['rental_status_id'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $numberOfDays = $_POST['number_of_days'];
    $dayRentalPrice = $_POST['day_rental_price'];

    // Insert the new rental agreement into the database
    $stmt = $conn->prepare("INSERT INTO Rental_Agreement (CustomerID, CarID, RentalStatusID, StartDate, EndDate, NumberOfDays, DayRentalPrice) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$customerID, $carID, $rentalStatusID, $startDate, $endDate, $numberOfDays, $dayRentalPrice]);

    // Redirect back to the rental_agreement_index.php page after creating the rental agreement
    header("Location: rental_agreement_index.php");
    exit;
}
?>
