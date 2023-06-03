<?php
include 'includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for Car information
    $model = $_POST['model'];
    $year = $_POST['year'];
    $color = $_POST['color'];
    $licensePlate = $_POST['license_plate'];
    $rentalAgencyID = $_POST['rental_agency_id'];
    $carStatusID = $_POST['car_status_id'];
    $pricePerDay = $_POST['price_per_day'];

    // Insert the new Car record into the database
    $stmt = $conn->prepare("INSERT INTO Car (Model, Year, Color, LicensePlate, RentalagencyID, CarstatusID, PricePerDay) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$model, $year, $color, $licensePlate, $rentalAgencyID, $carStatusID, $pricePerDay]);

    // Redirect back to the car_index.php page after adding the Car
    header("Location: car_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Car</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Add Car</h1>

    <!-- Add Car Form -->
    <form action="car_create.php" method="POST">
        <div>
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" required>
        </div>
        <div>
            <label for="year">Year:</label>
            <input type="text" name="year" id="year" required>
        </div>
        <div>
            <label for="color">Color:</label>
            <input type="text" name="color" id="color" required>
        </div>
        <div>
            <label for="license_plate">License Plate:</label>
            <input type="text" name="license_plate" id="license_plate" required>
        </div>
        <div>
            <label for="rental_agency_id">Rental Agency ID:</label>
            <input type="text" name="rental_agency_id" id="rental_agency_id" required>
        </div>
        <div>
            <label for="car_status_id">Car Status ID:</label>
            <input type="text" name="car_status_id" id="car_status_id" required>
        </div>
        <div>
            <label for="price_per_day">Price Per Day:</label>
            <input type="text" name="price_per_day" id="price_per_day" required>
        </div>

        <input type="submit" value="Add Car">
    </form>

    <a href="car_index.php">Back to Cars</a>

    <script src="script.js"></script>
</body>
</html>
