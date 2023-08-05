<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate form data (you can add more validation if needed)
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill out all the fields.";
        exit;
    }

    // Store the message in the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gwsc_db";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the user ID from the session
    $userId = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;

    // Prepare the SQL statement to insert the message
    $sql = "INSERT INTO contact_messages (user_id, name, email, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $userId, $name, $email, $message);

    if ($stmt->execute()) {
        echo "Thank you. Message sent successfully.";
        echo "<script>
            setTimeout(function() {
                window.location.href = '../index.php';
            }, 2000); // 2 seconds
          </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the contact page if the form is not submitted
    header("Location: contact.php");
    exit;
}
?>
