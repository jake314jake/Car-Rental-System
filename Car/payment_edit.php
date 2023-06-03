<?php
include 'includes/connection.php';

// Check if the payment ID is provided
if (isset($_GET['id'])) {
    $paymentID = $_GET['id'];

    // Retrieve the payment information from the database
    $stmt = $conn->prepare("SELECT * FROM Payment WHERE PaymentID = ?");
    $stmt->execute([$paymentID]);
    $payment = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$payment) {
        // Payment not found, handle the error or redirect to an error page
        // For simplicity, we'll redirect back to the payment_index.php page
        header("Location: payment_index.php");
        exit;
    }
} else {
    // Payment ID not provided, handle the error or redirect to an error page
    // For simplicity, we'll redirect back to the payment_index.php page
    header("Location: payment_index.php");
    exit;
}

// Update the payment information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for payment information
    $agreementID = $_POST['agreement_id'];
    $paymentDate = $_POST['payment_date'];
    $paymentAmount = $_POST['payment_amount'];
    $paymentMethod = $_POST['payment_method'];

    // Update the payment record in the database
    $stmt = $conn->prepare("UPDATE Payment SET AgreementID = ?, PaymentDate = ?, PaymentAmount = ?, PaymentMethod = ? WHERE PaymentID = ?");
    $stmt->execute([$agreementID, $paymentDate, $paymentAmount, $paymentMethod, $paymentID]);

    // Redirect back to the payment_index.php page after updating the payment
    header("Location: payment_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Payment</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Edit Payment</h1>

    <!-- Edit Payment Form -->
    <div class="form-container">
        <form action="payment_edit.php?id=<?php echo $paymentID; ?>" method="POST">
            <div class="form-group">
                <label for="agreement_id">Agreement ID:</label>
                <input type="text" name="agreement_id" id="agreement_id" value="<?php echo $payment['AgreementID']; ?>" required>
            </div>
            <div class="form-group">
                <label for="payment_date">Payment Date:</label>
                <input type="text" name="payment_date" id="payment_date" value="<?php echo $payment['PaymentDate']; ?>" required>
            </div>
            <div class="form-group">
                <label for="payment_amount">Payment Amount:</label>
                <input type="text" name="payment_amount" id="payment_amount" value="<?php echo $payment['PaymentAmount']; ?>" required>
            </div>
            <div class="form-group">
                <label for="payment_method">Payment Method:</label>
                <input type="text" name="payment_method" id="payment_method" value="<?php echo $payment['PaymentMethod']; ?>" required>
            </div>
            <button type="submit">Update Payment</button>
        </form>
    </div>
</body>
</html>
