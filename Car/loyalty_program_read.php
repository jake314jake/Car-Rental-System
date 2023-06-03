<?php
include 'includes/connection.php';

// Retrieve all loyalty programs from the database
$stmt = $conn->query("SELECT * FROM Loyalty_Program");
$loyaltyPrograms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Loyalty Programs</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Loyalty Programs</h1>

    <!-- Loyalty Program List -->
    <table>
        <tr>
            <th>Loyalty Program ID</th>
            <th>Loyalty Program Name</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($loyaltyPrograms as $loyaltyProgram) { ?>
        <tr>
            <td><?php echo $loyaltyProgram['LoyaltyProgramID']; ?></td>
            <td><?php echo $loyaltyProgram['LoyaltyProgramName']; ?></td>
            <td>
                <a href="loyalty_program_edit.php?id=<?php echo $loyaltyProgram['LoyaltyProgramID']; ?>">Edit</a>
                <a href="loyalty_program_delete.php?id=<?php echo $loyaltyProgram['LoyaltyProgramID']; ?>" onclick="return confirm('Are you sure you want to delete this loyalty program?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <script src="script.js"></script>
</body>
</html>
