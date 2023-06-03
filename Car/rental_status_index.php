<!DOCTYPE html>
<html>
<head>
    <title>Rental Status</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Rental Status</h1>

    <!-- Create Rental Status Form -->
    <div class="form-container">
        <h2>Create Rental Status</h2>
        <form action="rental_status_create.php" method="POST">
            <div class="form-group">
                <label for="status_name">Status Name:</label>
                <input type="text" name="status_name" id="status_name" required>
            </div>
            <button type="submit">Create Status</button>
        </form>
    </div>

    <!-- Rental Status List -->
    <table>
        <tr>
            <th>Status ID</th>
            <th>Status Name</th>
            <th>Actions</th>
        </tr>
        <?php include 'rental_status_read.php'; ?>
    </table>
</body>
</html>
