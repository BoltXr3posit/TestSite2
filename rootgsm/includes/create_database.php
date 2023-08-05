<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS gwsc_db";
if ($conn->query($sql) === true) {
    echo  "Database created successfully. ";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
