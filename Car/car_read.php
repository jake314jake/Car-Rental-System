<?php
include 'includes/connection.php';

// Retrieve all cars from the database
$stmt = $conn->prepare("SELECT * FROM Car");
$stmt->execute();
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Car List</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Car List</h1>

    <!-- Display Car List -->
    <table>
        <thead>
            <tr>
                <th>Car ID</th>
                <th>Model</th>
                <th>Year</th>
                <th>Color</th>
                <th>License Plate</th>
                <th>Rental Agency ID</th>
                <th>Car Status ID</th>
                <th>Price Per Day</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car) { ?>
                <tr>
                    <td><?php echo $car['CarID']; ?></td>
                    <td><?php echo $car['Model']; ?></td>
                    <td><?php echo $car['Year']; ?></td>
                    <td><?php echo $car['Color']; ?></td>
                    <td><?php echo $car['LicensePlate']; ?></td>
                    <td><?php echo $car['RentalagencyID']; ?></td>
                    <td><?php echo $car['CarstatusID']; ?></td>
                    <td><?php echo $car['PricePerDay']; ?></td>
                    <td>
                        <a href="car_edit.php?id=<?php echo $car['CarID']; ?>">Edit</a>
                        <a href="car_delete.php?id=<?php echo $car['CarID']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script src="script.js"></script>
</body>
</html>
