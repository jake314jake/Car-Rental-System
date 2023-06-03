<?php 
$host = 'localhost';
$db   = 'carrentaldb';
$user = 'root';
$pass = '';
$port = "4306";
$charset = 'utf8mb4';

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";

try {
   
    
     
     $conn= new \PDO($dsn, $user, $pass, $options);
     
     
     
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
     echo "Connection failed: " . $e->getMessage();
    }




?>