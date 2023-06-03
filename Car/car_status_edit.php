<?php
include 'includes/connection.php';

// Check if the car status ID is provided
if (isset($_GET['id'])) {
    $carStatusID = $_GET['id'];

    // Retrieve the car status information from the database
    $stmt = $conn->prepare("SELECT * FROM Car_Status WHERE CarStatusID = ?");
    $stmt->execute([$carStatusID]);
    $carStatus = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$carStatus) {
        // Car status not found, handle the error or redirect to an error page
        // For simplicity, we'll redirect back to the car_status_index.php page
        header("Location: car_status_index.php");
        exit;
    }
} else {
    // Car status ID not provided, handle the error or redirect to an error page
    // For simplicity, we'll redirect back to the car_status_index.php page
    header("Location: car_status_index.php");
    exit;
}

// Update the car status information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for car status
    $carStatusName = $_POST['car_status_name'];

    // Update the car status record in the database
    $stmt = $conn->prepare("UPDATE Car_Status SET CarStatusName = ? WHERE CarStatusID = ?");
    $stmt->execute([$carStatusName, $carStatusID]);

    // Redirect back to the car_status_index.php page after updating the car status
    header("Location: car_status_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Car Status</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Edit Car Status</h1>

    <!-- Edit Car Status Form -->
    <form action="car_status_edit.php?id=<?php echo $carStatusID; ?>" method="POST">
        <div>
            <label for="car_status_name">Car Status Name:</label>
            <input type="text" name="car_status_name" id="car_status_name" value="<?php echo $carStatus['CarStatusName']; ?>" required>
        </div>
        <div>
            <button type="submit">Update Car Status</button>
        </div>
    </form>

    <script src="script.js"></script>
</body>
</html>
