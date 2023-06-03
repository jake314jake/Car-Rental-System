<!DOCTYPE html>
<html>
<head>
    <title>Rental Agreements</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Rental Agreements</h1>

    <!-- Create Rental Agreement Form -->
    <div class="form-container">
        <h2>Create Rental Agreement</h2>
        <form action="rental_agreement_create.php" method="POST">
            <div class="form-group">
                <label for="customer_id">Customer ID:</label>
                <input type="text" name="customer_id" id="customer_id" required>
            </div>
            <div class="form-group">
                <label for="car_id">Car ID:</label>
                <input type="text" name="car_id" id="car_id" required>
            </div>
            <div class="form-group">
                <label for="rental_status_id">Rental Status ID:</label>
                <input type="text" name="rental_status_id" id="rental_status_id" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" required>
            </div>
            <div class="form-group">
                <label for="number_of_days">Number of Days:</label>
                <input type="text" name="number_of_days" id="number_of_days" required>
            </div>
            <div class="form-group">
                <label for="day_rental_price">Day Rental Price:</label>
                <input type="text" name="day_rental_price" id="day_rental_price" required>
            </div>
            <button type="submit">Create Agreement</button>
        </form>
    </div>

    <!-- Rental Agreements List -->
    <table>
        <tr>
            <th>Agreement ID</th>
            <th>Customer ID</th>
            <th>Car ID</th>
            <th>Rental Status ID</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Number of Days</th>
            <th>Day Rental Price</th>
            <th>Actions</th>
        </tr>
        <?php include 'rental_agreement_read.php'; ?>
    </table>
</body>
</html>
