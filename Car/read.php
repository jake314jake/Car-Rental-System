<?php
include 'includes/connection.php';

// Retrieve customers from the database
$stmt = $conn->prepare("SELECT * FROM Customer");
$stmt->execute();
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display customers in the table
foreach ($customers as $customer) {
    echo "<tr>";
    echo "<td>" . $customer['CustomerID'] . "</td>";
    echo "<td>" . $customer['FirstName'] . "</td>";
    echo "<td>" . $customer['LastName'] . "</td>";
    echo "<td>" . $customer['Email'] . "</td>";
    echo "<td>" . $customer['Address'] . "</td>";
    echo "<td>" . $customer['LoyaltyProgramID'] . "</td>";
    echo "<td>";
    echo "<a href='edit.php?id=" . $customer['CustomerID'] . "'>Edit</a>";
    echo " | ";
    echo "<a href='delete.php?id=" . $customer['CustomerID'] . "' onclick='return confirm(\"Are you sure you want to delete this customer?\")'>Delete</a>";
    echo "</td>";
    echo "</tr>";
}
?>
