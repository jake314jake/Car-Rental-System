<?php
include 'includes/connection.php';

// Read Loyalty Program Discounts
$stmt = $conn->query("SELECT * FROM Loyalty_Program_Discount");
$loyaltyProgramDiscounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Loyalty Program Discounts</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Loyalty Program Discounts</h1>

    <!-- Loyalty Program Discounts List -->
    <table>
        <tr>
            <th>Loyalty Program ID</th>
            <th>Discount Percentage</th>
        </tr>
        <?php foreach ($loyaltyProgramDiscounts as $loyaltyProgramDiscount) { ?>
        <tr>
            <td><?php echo $loyaltyProgramDiscount['LoyaltyProgramID']; ?></td>
            <td><?php echo $loyaltyProgramDiscount['DiscountPercentage']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
