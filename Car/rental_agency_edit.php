<?php
include 'includes/connection.php';

// Check if the rental agency ID is provided
if (isset($_GET['id'])) {
    $agencyID = $_GET['id'];

    // Retrieve the rental agency information from the database
    $stmt = $conn->prepare("SELECT * FROM Rental_Agency WHERE AgencyID = ?");
    $stmt->execute([$agencyID]);
    $rentalAgency = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$rentalAgency) {
        // Rental agency not found, handle the error or redirect to an error page
        // For simplicity, we'll redirect back to the rental_agency_read.php page
        header("Location: rental_agency_read.php");
        exit;
    }
} else {
    // Rental agency ID not provided, handle the error or redirect to an error page
    // For simplicity, we'll redirect back to the rental_agency_read.php page
    header("Location: rental_agency_read.php");
    exit;
}

// Update the rental agency information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for rental agency information
    $agencyName = $_POST['agency_name'];
    $phoneNumber = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Update the rental agency record in the database
    $stmt = $conn->prepare("UPDATE Rental_Agency SET AgencyName = ?, PhoneNumber = ?, Email = ?, address = ? WHERE AgencyID = ?");
    $stmt->execute([$agencyName, $phoneNumber, $email, $address, $agencyID]);

    // Redirect back to the rental_agency_read.php page after updating the rental agency
    header("Location: rental_agency_read.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Rental Agency</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Edit Rental Agency</h1>

    <!-- Edit Rental Agency Form -->
    <form action="rental_agency_edit.php?id=<?php echo $agencyID; ?>" method="POST">
        <div>
            <label for="agency_name">Agency Name:</label>
            <input type="text" name="agency_name" id="agency_name" value="<?php echo $rentalAgency['AgencyName']; ?>" required>
        </div>
        <div>
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" value="<?php echo $rentalAgency['PhoneNumber']; ?>" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $rentalAgency['Email']; ?>" required>
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" value="<?php echo $rentalAgency['Address']; ?>" required>
        </div>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
