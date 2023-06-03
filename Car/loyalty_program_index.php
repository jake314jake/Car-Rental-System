<?php
include 'includes/connection.php';

// Retrieve all loyalty programs from the database
$stmt = $conn->prepare("SELECT * FROM Loyalty_Program");
$stmt->execute();
$loyaltyPrograms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Loyalty Program List</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Loyalty Program List</h1>

    <!-- Loyalty Program Table -->
    <table>
        <tr>
            <th>Loyalty Program ID</th>
            <th>Loyalty Program Name</th>
            <th>Action</th>
        </tr>
        <?php foreach ($loyaltyPrograms as $loyaltyProgram) : ?>
        <tr>
            <td><?php echo $loyaltyProgram['LoyaltyProgramID']; ?></td>
            <td><?php echo $loyaltyProgram['LoyaltyProgramName']; ?></td>
            <td>
                <a href="loyalty_program_edit.php?id=<?php echo $loyaltyProgram['LoyaltyProgramID']; ?>">Edit</a>
                <a href="loyalty_program_delete.php?id=<?php echo $loyaltyProgram['LoyaltyProgramID']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="loyalty_program_create.php">Create New Loyalty Program</a>

    <script src="script.js"></script>
</body>
</html>
