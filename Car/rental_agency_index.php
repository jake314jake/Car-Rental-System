<?php
include 'includes/connection.php';

// Read Rental Agencies
$stmt = $conn->query("SELECT * FROM Rental_Agency");
$rentalAgencies = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Create Rental Agency
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

// Delete Rental Agency
if (isset($_GET['delete_id'])) {
    $agencyID = $_GET['delete_id'];

    $stmt = $conn->prepare("DELETE FROM Rental_Agency WHERE AgencyID = ?");
    $stmt->execute([$agencyID]);

    header("Location: rental_agency_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rental Agencies</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Rental Agencies</h1>

    <!-- Create Rental Agency Form -->
    <div class="form-container">
        <h2>Create Rental Agency</h2>
        <form action="rental_agency_index.php" method="POST">
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

    <!-- Rental Agencies List -->
    <table>
        <tr>
            <th>Agency ID</th>
            <th>Agency Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($rentalAgencies as $rentalAgency) { ?>
        <tr>
            <td><?php echo $rentalAgency['AgencyID']; ?></td>
            <td><?php echo $rentalAgency['AgencyName']; ?></td>
            <td><?php echo $rentalAgency['PhoneNumber']; ?></td>
            <td><?php echo $rentalAgency['Email']; ?></td>
            <td><?php echo $rentalAgency['address']; ?></td>
            <td>
                <a href="rental_agency_edit.php?id=<?php echo $rentalAgency['AgencyID']; ?>">Edit</a>
                <a href="rental_agency_delete.php?id=<?php echo $rentalAgency['AgencyID']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
