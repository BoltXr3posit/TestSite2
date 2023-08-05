<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>

    <nav>
        <a href="../index.php">Home</a>
    </nav>

    
    <h1>Register</h1>
    <form action="../includes/register_process.php" method="POST">
        <input type="text" name="firstname" placeholder="First Name" required>
        <input type="text" name="lastname" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Register">
    </form>
    <a href="login.php">Login</a>

    <script src="../js/validation.js"></script>

    <?php require_once '../includes/page_count.php'; ?>
</body>
</html>
