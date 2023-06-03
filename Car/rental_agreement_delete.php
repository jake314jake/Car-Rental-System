<?php
include 'includes/connection.php';

if (isset($_GET['id'])) {
    $agreementID = $_GET['id'];

    // Delete the rental agreement from the database
    $stmt = $conn->prepare("DELETE FROM Rental_Agreement WHERE AgreementID = ?");
    $stmt->execute([$agreementID]);

    // Redirect back to the rental_agreement_index.php page after deleting the rental agreement
    header("Location: rental_agreement_index.php");
    exit;
} else {
    echo "Invalid request. Please provide a valid rental agreement ID.";
}
?>
