<?php
include 'includes/connection.php';

// Check if the customer ID is provided
if (isset($_GET['id'])) {
    $customerID = $_GET['id'];

    // Retrieve the customer details from the database
    $stmt = $conn->prepare("SELECT * FROM Customer WHERE CustomerID = ?");
    $stmt->execute([$customerID]);
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$customer) {
        // If the customer does not exist, redirect back to the index page
        header("Location: index.html");
        exit;
    }
} else {
    // If the customer ID is not provided, redirect back to the index page
    header("Location: index.html");
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $loyaltyProgramID = $_POST['loyaltyProgramID'];

    // Update the customer details in the database
    $stmt = $conn->prepare("UPDATE Customer SET FirstName = ?, LastName = ?, Email = ?, Address = ?, LoyaltyProgramID = ? WHERE CustomerID = ?");
    $stmt->execute([$firstName, $lastName, $email, $address, $loyaltyProgramID, $customerID]);

    // Redirect back to the index page after updating the customer
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Edit Customer</h1>

    <!-- Edit Customer Form -->
    <form action="edit.php?id=<?php echo $customerID; ?>" method="POST">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo $customer['FirstName']; ?>" required>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo $customer['LastName']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $customer['Email']; ?>" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $customer['Address']; ?>" required>

        <label for="loyaltyProgramID">Loyalty Program ID:</label>
        <input type="number" id="loyaltyProgramID" name="loyaltyProgramID" value="<?php echo $customer['LoyaltyProgramID']; ?>" required>

        <input type="submit" value="Update Customer">
    </form>

    <a href="index.html">Back to Customers</a>

    <script src="script.js"></script>
</body>
</html>
