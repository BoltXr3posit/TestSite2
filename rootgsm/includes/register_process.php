<?php
session_start();

// Retrieve form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$userPassword = $_POST['password']; // Use a different variable name to avoid conflict

// Store user information in the database
$servername = "localhost";
$username = "root";
$dbPassword = ""; // Use a different variable name for the database password
$dbname = "gwsc_db";

$conn = new mysqli($servername, $username, $dbPassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user already exists
$existingUserQuery = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($existingUserQuery);

if ($result->num_rows > 0) {
    echo "User with this email already exists.";
    echo "<script>
            setTimeout(function() {
                window.location.href = '../pages/register.php';
            }, 2000); // 2 seconds
          </script>";
    $conn->close();
    exit;
}

// Insert the new user if not already exists
$insertQuery = "INSERT INTO users (firstname, lastname, email, password)
                VALUES ('$firstname', '$lastname', '$email', '$userPassword')";

if ($conn->query($insertQuery) === true) {
    echo "Registration successful.";
    echo "<script>
            setTimeout(function() {
                window.location.href = '../pages/login.php';
            }, 2000); // 2 seconds
          </script>";
} else {
    echo "Error: " . $insertQuery . "<br>" . $conn->error;
}

$conn->close();
?>
