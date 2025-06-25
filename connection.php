<?php
// Database connection details
$host = 'localhost';
$dbname = 'magnum'; 
$username = 'root';
$password = '';

// Create a connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Failed to connect to DB: " . $conn->connect_error);
} 
?>
