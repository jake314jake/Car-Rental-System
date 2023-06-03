<?php
include 'includes/connection.php';

// Retrieve loyalty programs from the database
$stmt = $conn->query("SELECT * FROM Loyalty_Program");
$loyaltyPrograms = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Create Loyalty Program Discount
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loyaltyProgramID = $_POST['loyalty_program_id'];
    $discountPercentage = $_POST['discount_percentage'];

    // Insert the loyalty program discount into the database
    $stmt = $conn->prepare("INSERT INTO Loyalty_Program_Discount (LoyaltyProgramID, DiscountPercentage) VALUES (?, ?)");
    $stmt->execute([$loyaltyProgramID, $discountPercentage]);

    // Redirect back to the loyalty_program_discount_index.php page after creating the discount
    header("Location: loyalty_program_discount_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Loyalty Program Discount</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Create Loyalty Program Discount</h1>

    <!-- Loyalty Program Discount Form -->
    <form action="loyalty_program_discount_create.php" method="POST">
        <div class="form-group">
            <label for="loyalty_program_id">Loyalty Program:</label>
            <select name="loyalty_program_id" id="loyalty_program_id" required>
                <?php foreach ($loyaltyPrograms as $loyaltyProgram) { ?>
                <option value="<?php echo $loyaltyProgram['LoyaltyProgramID']; ?>"><?php echo $loyaltyProgram['LoyaltyProgramName']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="discount_percentage">Discount Percentage:</label>
            <input type="text" name="discount_percentage" id="discount_percentage" required>
        </div>
        <button type="submit">Create Discount</button>
    </form>
</body>
</html>

