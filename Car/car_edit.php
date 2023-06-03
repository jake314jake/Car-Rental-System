<?php
include 'includes/connection.php';

// Check if the car ID is provided
if (isset($_GET['id'])) {
    $carID = $_GET['id'];

    // Retrieve the car information from the database
    $stmt = $conn->prepare("SELECT * FROM Car WHERE CarID = ?");
    $stmt->execute([$carID]);
    $car = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$car) {
        // Car not found, handle the error or redirect to an error page
        // For simplicity, we'll redirect back to the car_index.php page
        header("Location: car_index.php");
        exit;
    }
} else {
    // Car ID not provided, handle the error or redirect to an error page
    // For simplicity, we'll redirect back to the car_index.php page
    header("Location: car_index.php");
    exit;
}

// Update the car information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for car information
    $model = $_POST['model'];
    $year = $_POST['year'];
    $color = $_POST['color'];
    $licensePlate = $_POST['license_plate'];
    $rentalAgencyID = $_POST['rental_agency_id'];
    $carStatusID = $_POST['car_status_id'];
    $pricePerDay = $_POST['price_per_day'];

    // Update the car record in the database
    $stmt = $conn->prepare("UPDATE Car SET Model = ?, Year = ?, Color = ?, LicensePlate = ?, RentalagencyID = ?, CarstatusID = ?, PricePerDay = ? WHERE CarID = ?");
    $stmt->execute([$model, $year, $color, $licensePlate, $rentalAgencyID, $carStatusID, $pricePerDay, $carID]);

    // Redirect back to the car_index.php page after updating the car
    header("Location: car_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Car</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Edit Car</h1>

    <!-- Edit Car Form -->
    <form action="car_edit.php?id=<?php echo $carID; ?>" method="POST">
        <div>
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" value="<?php echo $car['Model']; ?>" required>
        </div>
        <div>
            <label for="year">Year:</label>
            <input type="text" name="year" id="year" value="<?php echo $car['Year']; ?>" required>
        </div>
        <div>
            <label for="color">Color:</label>
            <input type="text" name="color" id="color" value="<?php echo $car['Color']; ?>" required>
        </div>
        <div>
            <label for="license_plate">License Plate:</label>
            <input type="text" name="license_plate" id="license_plate" value="<?php echo $car['LicensePlate']; ?>" required>
        </div>
        <div>
            <label for="rental_agency_id">Rental Agency ID:</label>
            <input type="text" name="rental_agency_id" id="rental_agency_id" value="<?php echo $car['RentalagencyID']; ?>" required>
        </div>
        <div>
            <label for="car_status_id">Car Status ID:</label>
            <input type="text" name="car_status_id" id="car_status_id" value="<?php echo $car['CarstatusID']; ?>" required>
        </div>
        <div>
            <label for="price_per_day">Price Per Day:</label>
            <input type="text" name="price_per_day" id="price_per_day" value="<?php echo $car['PricePerDay']; ?>" required>
        </div>
        <div>
            <button type="submit">Update Car</button>
        </div>
    </form>

    <script src="script.js"></script>
</body>
</html>

