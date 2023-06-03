<?php
include 'includes/connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $loyaltyProgramID = $_POST['loyaltyProgramID'];

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO Customer (FirstName, LastName, Email, Address, LoyaltyProgramID) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$firstName, $lastName, $email, $address, $loyaltyProgramID]);

    // Redirect back to the index page after adding the customer
    header("Location: index.html");
}
?>
