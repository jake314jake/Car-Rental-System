<?php
include 'includes/connection.php';

// Read Payments
$stmt = $conn->query("SELECT * FROM Payment");
$payments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Create Payment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $agreementID = $_POST['agreement_id'];
    $paymentDate = $_POST['payment_date'];
    $paymentAmount = $_POST['payment_amount'];
    $paymentMethod = $_POST['payment_method'];

    $stmt = $conn->prepare("INSERT INTO Payment (AgreementID, PaymentDate, PaymentAmount, PaymentMethod) VALUES (?, ?, ?, ?)");
    $stmt->execute([$agreementID, $paymentDate, $paymentAmount, $paymentMethod]);

    header("Location: payment_index.php");
    exit;
}

// Delete Payment
if (isset($_GET['delete_id'])) {
    $paymentID = $_GET['delete_id'];

    $stmt = $conn->prepare("DELETE FROM Payment WHERE PaymentID = ?");
    $stmt->execute([$paymentID]);

    header("Location: payment_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payments</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Payments</h1>

    <!-- Create Payment Form -->
    <div class="form-container">
        <h2>Create Payment</h2>
        <form action="payment_index.php" method="POST">
            <div class="form-group">
                <label for="agreement_id">Agreement ID:</label>
                <input type="text" name="agreement_id" id="agreement_id" required>
            </div>
            <div class="form-group">
                <label for="payment_date">Payment Date:</label>
                <input type="text" name="payment_date" id="payment_date" required>
            </div>
            <div class="form-group">
                <label for="payment_amount">Payment Amount:</label>
                <input type="text" name="payment_amount" id="payment_amount" required>
            </div>
            <div class="form-group">
                <label for="payment_method">Payment Method:</label>
                <input type="text" name="payment_method" id="payment_method" required>
            </div>
            <button type="submit">Create Payment</button>
        </form>
    </div>

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
                <a href="payment_delete.php?delete_id=<?php echo $payment['PaymentID']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
