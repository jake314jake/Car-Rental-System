<?php
include 'includes/connection.php';

// Check if the rental status ID is provided
if (isset($_GET['id'])) {
    $statusID = $_GET['id'];

    // Retrieve the rental status information from the database
    $stmt = $conn->prepare("SELECT * FROM Rental_Status WHERE RentalStatusID = ?");
    $stmt->execute([$statusID]);
    $status = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$status) {
        // Rental status not found, handle the error or redirect to an error page
        // For simplicity, we'll redirect back to the rental_status_index.php page
        header("Location: rental_status_index.php");
        exit;
    }
} else {
    // Rental status ID not provided, handle the error or redirect to an error page
    // For simplicity, we'll redirect back to the rental_status_index.php page
    header("Location: rental_status_index.php");
    exit;
}

// Update the rental status information in the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $statusName = $_POST['status_name'];

    $stmt = $conn->prepare("UPDATE Rental_Status SET RentalStatusName = ? WHERE RentalStatusID = ?");
    $stmt->execute([$statusName, $statusID]);

    // Redirect back to the rental_status_index.php page after updating the rental status
    header("Location: rental_status_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Rental Status</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Edit Rental Status</h1>

    <!-- Edit Rental Status Form -->
    <div class="form-container">
        <form action="rental_status_edit.php?id=<?php echo $statusID; ?>" method="POST">
            <div class="form-group">
                <label for="status_name">Status Name:</label>
                <input type="text" name="status_name" id="status_name" value="<?php echo $status['RentalStatusName']; ?>" required>
            </div>
            <button type="submit">Update Status</button>
        </form>
    </div>
</body>
</html>
