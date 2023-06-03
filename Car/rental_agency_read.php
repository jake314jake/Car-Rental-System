<?php
include 'includes/connection.php';

$stmt = $conn->query("SELECT * FROM Rental_Agency");
$rentalAgencies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rental Agencies</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Rental Agencies</h1>

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
            <td><?php echo $rentalAgency['Address']; ?></td>
            <td>
                <a href="rental_agency_edit.php?id=<?php echo $rentalAgency['AgencyID']; ?>">Edit</a>
                <a href="rental_agency_delete.php?id=<?php echo $rentalAgency['AgencyID']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
