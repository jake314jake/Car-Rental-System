<!DOCTYPE html>
<html>
<head>
    <title>Customer Management</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Customer Management</h1>

    <!-- Add Customer Form -->
    <h2>Add Customer</h2>
    <form action="create.php" method="POST">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="loyaltyProgramID">Loyalty Program ID:</label>
        <input type="number" id="loyaltyProgramID" name="loyaltyProgramID" required>

        <input type="submit" value="Add Customer">
    </form>

    <!-- Display Customers -->
    <h2>Customers</h2>
    <table>
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Loyalty Program ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'read.php'; ?>
        </tbody>
    </table>

    <script src="script.js"></script>
</body>
</html>
