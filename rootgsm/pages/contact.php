<?php include '../includes/functions.php'?>

<?php 
require_once '../includes/db_config.php'; // Include the database configuration file
session_start(); 

 // Get the total view count
    $totalViews = 0;
    $stmt = $conn->prepare("SELECT SUM(view_count) AS total_views FROM page_views");
    $stmt->execute();
    $stmt->bind_result($totalViews);
    $stmt->fetch();
    $stmt->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>

   <?php include'../includes/pagenav.php';?>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        echo "<h1>Contact Us</h1>";
    } else {
        header("Location: index_loggedout.php");
        exit;
    }


    ?>


<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    
    <p>If you have any questions or inquiries, please feel free to reach out to us using the contact information below:</p>
    
    <h2>Email</h2>
    <p>Email: info@globalwildswimming.com</p>
    
    <h2>Phone</h2>
    <p>Phone: +1234567890</p>
    
    <h2>Address</h2>
    <p>123 Street, City ABC, United Kingdom.</p>

    
    <h2>Send us a message</h2>
    <form action="../includes/process_contact.php" method="POST">
        <input type="text" name="name" placeholder="Your Name" required><br>
        <input type="email" name="email" placeholder="Your Email" required><br>
        <textarea name="message" placeholder="Your Message" required></textarea><br>
        <input type="submit" value="Send Message">
    </form>


</body>
</html>

        <!-- Display the total view count -->
    <div class="view-count">
        <span>Total Website Views: <?php echo $totalViews; ?></span>
    </div>

<?php require_once '../includes/page_count.php'; ?>
<?php include '../includes/footer.php'; ?>

</body>
</html>
