<?php
include 'includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for car status
    $carStatusName = $_POST['car_status_name'];

    // Insert the new car status into the database
    $stmt = $conn->prepare("INSERT INTO Car_Status (CarStatusName) VALUES (?)");
    $stmt->execute([$carStatusName]);

    // Redirect back to the car_status_index.php page after creating the car status
    header("Location: car_status_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Car Status</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Create Car Status</h1>

    <!-- Create Car Status Form -->
    <form action="car_status_create.php" method="POST">
        <div>
            <label for="car_status_name">Car Status Name:</label>
            <input type="text" name="car_status_name" id="car_status_name" required>
        </div>
        <div>
            <button type="submit">Create Car Status</button>
        </div>
    </form>

    <script src="script.js"></script>
</body>
</html>
