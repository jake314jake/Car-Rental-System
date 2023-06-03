<?php
include 'includes/connection.php';

// Check if the rental agreement ID is provided
if (isset($_GET['id'])) {
    $agreementID = $_GET['id'];

    // Retrieve the rental agreement information from the database
    $stmt = $conn->prepare("SELECT * FROM Rental_Agreement WHERE AgreementID = ?");
    $stmt->execute([$agreementID]);
    $rentalAgreement = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$rentalAgreement) {
        // Rental agreement not found, handle the error or redirect to an error page
        // For simplicity, we'll redirect back to the rental_agreement_index.php page
        header("Location: rental_agreement_index.php");
        exit;
    }
} else {
    // Rental agreement ID not provided, handle the error or redirect to an error page
    // For simplicity, we'll redirect back to the rental_agreement_index.php page
    header("Location: rental_agreement_index.php");
    exit;
}

// Update the rental agreement information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for rental agreement information
    $customerID = $_POST['customer_id'];
    $carID = $_POST['car_id'];
    $rentalStatusID = $_POST['rental_status_id'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $numberOfDays = $_POST['number_of_days'];
    $dayRentalPrice = $_POST['day_rental_price'];

    // Update the rental agreement record in the database
    $stmt = $conn->prepare("UPDATE Rental_Agreement SET CustomerID = ?, CarID = ?, RentalStatusID = ?, StartDate = ?, EndDate = ?, NumberOfDays = ?, DayRentalPrice = ? WHERE AgreementID = ?");
    $stmt->execute([$customerID, $carID, $rentalStatusID, $startDate, $endDate, $numberOfDays, $dayRentalPrice, $agreementID]);

    // Redirect back to the rental_agreement_index.php page after updating the rental agreement
    header("Location: rental_agreement_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Rental Agreement</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Edit Rental Agreement</h1>

    <!-- Edit Rental Agreement Form -->
    <form action="rental_agreement_edit.php?id=<?php echo $agreementID; ?>" method="POST">
        <div>
            <label for="customer_id">Customer ID:</label>
            <input type="text" name="customer_id" id="customer_id" value="<?php echo $rentalAgreement['CustomerID']; ?>" required>
        </div>
        <div>
            <label for="car_id">Car ID:</label>
            <input type="text" name="car_id" id="car_id" value="<?php echo $rentalAgreement['CarID']; ?>" required>
        </div>
        <div>
            <label for="rental_status_id">Rental Status ID:</label>
            <input type="text" name="rental_status_id" id="rental_status_id" value="<?php echo $rentalAgreement['RentalStatusID']; ?>" required>
        </div>
        <div>
            <label for="start_date">Start Date:</label>
            <input type="text" name="start_date" id="start_date" value="<?php echo $rentalAgreement['StartDate']; ?>" required>
        </div>
        <div>
            <label for="end_date">End Date:</label>
            <input type="text" name="end_date" id="end_date" value="<?php echo $rentalAgreement['EndDate']; ?>" required>
        </div>
        <div>
            <label for="number_of_days">Number of Days:</label>
            <input type="text" name="number_of_days" id="number_of_days" value="<?php echo $rentalAgreement['NumberOfDays']; ?>" required>
        </div>
        <div>
            <label for="day_rental_price">Day Rental Price:</label>
            <input type="text" name="day_rental_price" id="day_rental_price" value="<?php echo $rentalAgreement['DayRentalPrice']; ?>" required>
        </div>
        <button type="submit">Update Rental Agreement</button>
    </form>
</body>
</html>
