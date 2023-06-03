<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carrentalx";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Fetch counts from each table
  $tables = array('Customer', 'Car', 'Car_Status', 'Loyalty_Program', 'Loyalty_Program_Discount', 'Rental_Agency', 'Rental_Status', 'Payment', 'Rental_Agreement');
  $data = array();

  foreach ($tables as $table) {
    $sql = "SELECT COUNT(*) AS count FROM $table";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $row['count'];
    $data[$table] = $count;
    echo"$count";
  }

  // Send JSON response
  header('Content-Type: application/json');
  echo json_encode($data);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
?>
