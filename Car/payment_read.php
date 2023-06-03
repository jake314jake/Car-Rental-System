<?php
include 'includes/connection.php';

// Read Payments
$stmt = $conn->query("SELECT * FROM Payment");
$payments = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Payments</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Payments</h1>

    <!-- Payments List -->
    <table>
        <tr>
            <th>Payment ID</th>
            <th>Agreement ID</th>
            <th>Payment Date</th>
            <th>Payment Amount</th>
            <th>Payment Method</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($payments as $payment) { ?>
        <tr>
            <td><?php echo $payment['PaymentID']; ?></td>
            <td><?php echo $payment['AgreementID']; ?></td>
            <td><?php echo $payment['PaymentDate']; ?></td>
            <td><?php echo $payment['PaymentAmount']; ?></td>
            <td><?php echo $payment['PaymentMethod']; ?></td>
            <td>
                <a href="payment_edit.php?id=<?php echo $payment['PaymentID']; ?>">Edit</a>
                <a href="payment_delete.php?id=<?php echo $payment['PaymentID']; ?>" onclick="return confirm('Are you sure you want to delete this payment?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
