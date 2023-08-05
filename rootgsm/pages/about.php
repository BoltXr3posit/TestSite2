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
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>

       <?php include'../includes/pagenav.php';?>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {

        //Define user variable here.

        $firstName = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "User"; // Fallback value if firstname is not set
        
        $emailAddress = isset($_SESSION['email']) ? $_SESSION['email'] : "Email Address"; // Fallback value if email adress is not set.

        //_________________________________________________________


        echo "<h1>About</h1>";
    } else {
        header("Location: index_loggedout.php");
        exit;
    }

    echo " <p>Global Wild Swimming and Camping (GWSC) is an energetic business in the market and we want to help you access our amazing services that you normally could not unless you were a local in our area. <br>

    Our goal is to help you get going quicker with our online services that help you book camp site and see the wild swimming areas you will be jumping into from the comfort of your home at the computer or on your phone. <br>

    Book a swimming session with us or secure are spot to pitch a tent.<br>
    Come on <b>$firstName!</b> <br>
    Lets go wild.<br>

   

    </p>";

    ?>

<!-- Display the total view count -->
    <div class="view-count">
        <span>Total Website Views: <?php echo $totalViews; ?></span>
    </div>

<?php require_once '../includes/page_count.php'; ?>
<?php include '../includes/footer.php'; ?>

</body>
</html>
