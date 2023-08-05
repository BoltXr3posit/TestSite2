<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
    
    <nav>
        <a href="../index.php">Home</a>
    </nav>
    
    <h1>Login</h1>
    <form action="login_check.php" method="POST">
        <input type="email" name="email" placeholder="Email Address" required><br>
        <input type="password" name="password" placeholder="Password" required><br>

         <!-- Add the reCAPTCHA widget -->
        <div class="g-recaptcha" data-sitekey="6LdOXQwnAAAAANhNS3tVWZ89VuINq5eKVpLWKiva"></div><br><br>
        
        <input type="submit" value="Login">
    </form>

    <?php require_once '../includes/page_count.php'; ?>
</body>
</html>
