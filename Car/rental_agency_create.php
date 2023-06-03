<?php
include 'includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $agencyName = $_POST['agency_name'];
    $phoneNumber = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("INSERT INTO Rental_Agency (AgencyName, PhoneNumber, Email, address) VALUES (?, ?, ?, ?)");
    $stmt->execute([$agencyName, $phoneNumber, $email, $address]);

    header("Location: rental_agency_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Rental Agency</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Create Rental Agency</h1>

    <!-- Create Rental Agency Form -->
    <div class="form-container">
        <form action="rental_agency_create.php" method="POST">
            <div class="form-group">
                <label for="agency_name">Agency Name:</label>
                <input type="text" name="agency_name" id="agency_name" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" required>
            </div>
            <button type="submit">Create Agency</button>
        </form>
    </div>
</body>
</html>
