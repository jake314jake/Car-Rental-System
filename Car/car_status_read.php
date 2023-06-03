<?php
include 'includes/connection.php';

// Retrieve all car statuses from the database
$stmt = $conn->prepare("SELECT * FROM Car_Status");
$stmt->execute();
$carStatuses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Car Status List</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Car Status List</h1>

    <!-- Car Status Table -->
    <table>
        <tr>
            <th>Car Status ID</th>
            <th>Car Status Name</th>
            <th>Action</th>
        </tr>
        <?php foreach ($carStatuses as $carStatus) : ?>
        <tr>
            <td><?php echo $carStatus['CarStatusID']; ?></td>
            <td><?php echo $carStatus['CarStatusName']; ?></td>
            <td>
                <a href="car_status_edit.php?id=<?php echo $carStatus['CarStatusID']; ?>">Edit</a>
                <a href="car_status_delete.php?id=<?php echo $carStatus['CarStatusID']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="car_status_create.php">Create New Car Status</a>

    <script src="script.js"></script>
</body>
</html>
