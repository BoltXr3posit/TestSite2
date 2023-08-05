<?php

// Database configuration variables
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'gwsc_db';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the character set
$conn->set_charset('utf8');
