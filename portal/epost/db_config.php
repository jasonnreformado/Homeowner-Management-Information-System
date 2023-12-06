<?php
// Database configuration
$dbConfig = array(
    'host' => 'localhost', // Change to your database host
    'username' => 'root', // Change to your database username
    'password' => '', // Change to your database password
    'database' => 'vasdb' // Change to your database name
);

// Create a database connection
$conn = mysqli_connect($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database']);

// Check for connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
