<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gwsc_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the page name
    $pageName = basename($_SERVER['PHP_SELF']);

    // Check if a row exists for the page in the page_views table
    $stmt = $conn->prepare("SELECT * FROM page_views WHERE page_name = :page_name");
    $stmt->bindParam(':page_name', $pageName);
    $stmt->execute();

    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
        // Update the existing row
        $stmt = $conn->prepare("UPDATE page_views SET view_count = view_count + 1 WHERE page_name = :page_name");
        $stmt->bindParam(':page_name', $pageName);
        $stmt->execute();
    } else {
        // Insert a new row for the page
        $stmt = $conn->prepare("INSERT INTO page_views (page_name, view_count) VALUES (:page_name, 1)");
        $stmt->bindParam(':page_name', $pageName);
        $stmt->execute();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
