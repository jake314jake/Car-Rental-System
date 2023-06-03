<?php
include 'includes/connection.php';

// Read Rental Agreements
$stmt = $conn->query("SELECT * FROM Rental_Agreement");
$rentalAgreements = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rentalAgreements as $rentalAgreement) {
    echo "<tr>";
    echo "<td>" . $rentalAgreement['AgreementID'] . "</td>";
    echo "<td>" . $rentalAgreement['CustomerID'] . "</td>";
    echo "<td>" . $rentalAgreement['CarID'] . "</td>";
    echo "<td>" . $rentalAgreement['RentalStatusID'] . "</td>";
    echo "<td>" . $rentalAgreement['StartDate'] . "</td>";
    echo "<td>" . $rentalAgreement['EndDate'] . "</td>";
    echo "<td>" . $rentalAgreement['NumberOfDays'] . "</td>";
    echo "<td>" . $rentalAgreement['DayRentalPrice'] . "</td>";
    echo "<td>";
    echo "<a href='rental_agreement_edit.php?id=" . $rentalAgreement['AgreementID'] . "'>Edit</a>";
    echo "<a href='rental_agreement_delete.php?id=" . $rentalAgreement['AgreementID'] . "'>Delete</a>";
    echo "</td>";
    echo "</tr>";
}
?>
