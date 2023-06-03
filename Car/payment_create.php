<?php
include 'includes/connection.php';

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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Payment</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Create Payment</h1>

    <div class="form-container">
        <form action="payment_create.php" method="POST">
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
</body>
</html>
