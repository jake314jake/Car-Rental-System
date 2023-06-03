<?php
include 'includes/connection.php';

// Check if the loyalty program discount ID is provided
if (isset($_GET['id'])) {
    $loyaltyProgramID = $_GET['id'];

    // Retrieve the loyalty program discount information from the database
    $stmt = $conn->prepare("SELECT * FROM Loyalty_Program_Discount WHERE LoyaltyProgramID = ?");
    $stmt->execute([$loyaltyProgramID]);
    $loyaltyProgramDiscount = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$loyaltyProgramDiscount) {
        // Loyalty program discount not found, handle the error or redirect to an error page
        // For simplicity, we'll redirect back to the loyalty_program_discount_index.php page
        header("Location: loyalty_program_discount_index.php");
        exit;
    }
} else {
    // Loyalty program discount ID not provided, handle the error or redirect to an error page
    // For simplicity, we'll redirect back to the loyalty_program_discount_index.php page
    header("Location: loyalty_program_discount_index.php");
    exit;
}

// Update the loyalty program discount information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for loyalty program discount information
    $discountPercentage = $_POST['discount_percentage'];

    // Update the loyalty program discount record in the database
    $stmt = $conn->prepare("UPDATE Loyalty_Program_Discount SET DiscountPercentage = ? WHERE LoyaltyProgramID = ?");
    $stmt->execute([$discountPercentage, $loyaltyProgramID]);

    // Redirect back to the loyalty_program_discount_index.php page after updating the loyalty program discount
    header("Location: loyalty_program_discount_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Loyalty Program Discount</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Edit Loyalty Program Discount</h1>

    <!-- Edit Loyalty Program Discount Form -->
    <form action="loyalty_program_discount_edit.php?id=<?php echo $loyaltyProgramID; ?>" method="POST">
        <div>
            <label for="discount_percentage">Discount Percentage:</label>
            <input type="text" name="discount_percentage" id="discount_percentage" value="<?php echo $loyaltyProgramDiscount['DiscountPercentage']; ?>" required>
        </div>
        <button type="submit">Update Discount</button>
    </form>
</body>
</html>
