<?php
// get_user_info.php

session_start();

require_once 'db_config.php'; // Include the database configuration file

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Retrieve the user's first name from the server-side or database
    $userId = $_SESSION['userid'];
    $firstName = '';

    // Query the database to get the user's first name based on their user ID
    $sql = "SELECT firstname FROM users WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('s', $userId);
    $stmt->execute();
    $stmt->bind_result($firstName);
    $stmt->fetch();
    $stmt->close();

    // Return the user's first name as JSON
    echo json_encode(['firstName' => $firstName]);
} else {
    // User not logged in or session expired
    echo json_encode(['error' => 'User not logged in']);
}
