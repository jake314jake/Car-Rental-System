<?php
include 'includes/connection.php';

// Insert new loyalty program
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for loyalty program
    $loyaltyProgramName = $_POST['loyalty_program_name'];

    // Insert the loyalty program record into the database
    $stmt = $conn->prepare("INSERT INTO Loyalty_Program (LoyaltyProgramName) VALUES (?)");
    $stmt->execute([$loyaltyProgramName]);

    // Redirect back to the loyalty_program_index.php page after creating the loyalty program
    header("Location: loyalty_program_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Loyalty Program</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Create Loyalty Program</h1>

    <!-- Create Loyalty Program Form -->
    <form action="loyalty_program_create.php" method="POST">
        <div>
            <label for="loyalty_program_name">Loyalty Program Name:</label>
            <input type="text" name="loyalty_program_name" id="loyalty_program_name" required>
        </div>
        <div>
            <button type="submit">Create Loyalty Program</button>
        </div>
    </form>

    <script src="script.js"></script>
</body>
</html>
