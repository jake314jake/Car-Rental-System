<!DOCTYPE html>
<html>
<head>
    <title>Car Rental System - Cars</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Car Rental System - Cars</h1>

    <!-- Add Car Link -->
    <a href="car_create.php" class="add-link">Add Car</a>

    <!-- Car Table -->
    <table>
        <tr>
            <th>Car ID</th>
            <th>Model</th>
            <th>Year</th>
            <th>Color</th>
            <th>License Plate</th>
            <th>Rental Agency ID</th>
            <th>Car Status ID</th>
            <th>Price Per Day</th>
            <th>Actions</th>
        </tr>

        <?php
        include 'includes/connection.php';

        // Retrieve cars from the database
        $stmt = $conn->prepare("SELECT * FROM Car");
        $stmt->execute();
        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display cars in the table
        foreach ($cars as $car) {
            echo "<tr>";
            // Display car information in the table cells
            echo "<td>" . $car['CarID'] . "</td>";
            echo "<td>" . $car['Model'] . "</td>";
            echo "<td>" . $car['Year'] . "</td>";
            echo "<td>" . $car['Color'] . "</td>";
            echo "<td>" . $car['LicensePlate'] . "</td>";
            echo "<td>" . $car['RentalAgencyID'] . "</td>";
            echo "<td>" . $car['CarStatusID'] . "</td>";
            echo "<td>" . $car['PricePerDay'] . "</td>";

            // Add Edit and Delete links for each car
            echo "<td>";
            echo "<a href='car_edit.php?id=" . $car['CarID'] . "'>Edit</a> ";
            echo "<a href='car_delete.php?id=" . $car['CarID'] . "'>Delete</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </table>

    <script src="script.js"></script>
</body>
</html>
