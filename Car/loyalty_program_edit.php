<?php
include 'includes/connection.php';

// Check if the loyalty program ID is provided
if (isset($_GET['id'])) {
    $loyaltyProgramID = $_GET['id'];

    // Retrieve the loyalty program information from the database
    $stmt = $conn->prepare("SELECT * FROM Loyalty_Program WHERE LoyaltyProgramID = ?");
    $stmt->execute([$loyaltyProgramID]);
    $loyaltyProgram = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$loyaltyProgram) {
        // Loyalty program not found, handle the error or redirect to an error page
        // For simplicity, we'll redirect back to the loyalty_program_index.php page
        header("Location: loyalty_program_index.php");
        exit;
    }
} else {
    // Loyalty program ID not provided, handle the error or redirect to an error page
    // For simplicity, we'll redirect back to the loyalty_program_index.php page
    header("Location: loyalty_program_index.php");
    exit;
}

// Update the loyalty program information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for loyalty program information
    $loyaltyProgramName = $_POST['loyalty_program_name'];

    // Update the loyalty program record in the database
    $stmt = $conn->prepare("UPDATE Loyalty_Program SET LoyaltyProgramName = ? WHERE LoyaltyProgramID = ?");
    $stmt->execute([$loyaltyProgramName, $loyaltyProgramID]);

    // Redirect back to the loyalty_program_index.php page after updating the loyalty program
    header("Location: loyalty_program_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Loyalty Program</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Edit Loyalty Program</h1>

    <!-- Edit Loyalty Program Form -->
    <form action="loyalty_program_edit.php?id=<?php echo $loyaltyProgramID; ?>" method="POST">
        <div>
            <label for="loyalty_program_name">Loyalty Program Name:</label>
            <input type="text" name="loyalty_program_name" id="loyalty_program_name" value="<?php echo $loyaltyProgram['LoyaltyProgramName']; ?>" required>
        </div>
        <div>
            <button type="submit">Update Loyalty Program</button>
        </div>
    </form>

    <script src="script.js"></script>
</body>
</html>
