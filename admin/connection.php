<?php
// Database configuration
$host = 'localhost'; // Hostname
$username = 'root'; // Database username
$password = ''; // Database password
$database = 'car'; // Database name

// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
