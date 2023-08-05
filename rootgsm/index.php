<?php
require_once 'includes/create_database.php';
require_once 'includes/create_tables.php';
include 'includes/functions.php'

?>
<?php 
require_once 'includes/db_config.php'; // Include the database configuration file
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
    <title>Home</title>

    <?php include 'includes/search_bar.php';?>

    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <link rel="stylesheet" type="text/css" href="css/slideshow.css">

</head>
<body>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        
        $firstName = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "User"; // Fallback value if firstname is not set
        
        $emailAddress = isset($_SESSION['email']) ? $_SESSION['email'] : "Email Address"; // Fallback value if email adress is not set
        

        echo "<h1 id='welcomeMessage' data-firstname='$firstName'>Welcome to Global Wild Swimming and Camping, <br> $firstName!</h1> <ba>";

        echo "<h2 id='emailDispaly' data-email='$emailAddress'>$emailAddress</h2> <ba>";
       
    } else {
        header("Location: pages/index_loggedout.php");
        exit;
    }

    include 'includes/navigation.php';
    

    ?>

    <!-- Slideshow Container -->
    <div class="slideshow-container">
        <div class="slideshow-image fade">
            <img src="images/slide1.jpg" alt="Slide 1">
        </div>
        <div class="slideshow-image fade">
            <img src="images/slide2.jpg" alt="Slide 2">
        </div>
        <div class="slideshow-image fade">
            <img src="images/slide3.jpg" alt="Slide 3">
        </div>
    </div>

  <!-- Display the total view count -->
    <div class="view-count">
        <span>Total Website Views: <?php echo $totalViews; ?></span>
    </div>

<!-- Display the map -->
  
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7uRDwU1JpKUEVPD7KOw_hCuIrGhLl9hM&callback=initMap" async defer></script>


    <script src="js/maps.js"></script>

    <script src="js/slideshow.js"></script>

    <script src="js/navigation.js"></script>

    

    <?php require_once 'includes/page_count.php'; ?>


    <?php include 'includes/footer.php'; ?>
</body>
</html>
