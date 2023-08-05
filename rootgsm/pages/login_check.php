<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gwsc_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

// Verify the reCAPTCHA response
$recaptchaResponse = $_POST['g-recaptcha-response'];
$secretKey = '6LdOXQwnAAAAAGb59zubJbcykdCJpzDimOz_1LxE'; 

// Make a POST request to the reCAPTCHA API
$verificationUrl = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
    'secret' => $secretKey,
    'response' => $recaptchaResponse
);
$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);
$context = stream_context_create($options);
$verify = file_get_contents($verificationUrl, false, $context);
$responseData = json_decode($verify);

if ($responseData && $responseData->success) {
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['loggedin'] = true;
        echo "Login successful";
        header("Location: ../index.php");
        exit;
    } else {
        echo "Invalid credentials";
    }
} else {
    echo "reCAPTCHA verification failed";
}

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['userid'] = $row['id'];
    $_SESSION['firstname'] = $row['firstname']; // Store the first name in the session
    $_SESSION['email'] = $row['email']; // Store the email address in the session

    echo "Login successful";

    header("Location: ../index.php");
    exit;
} else {
    echo "Invalid credentials";
}

$conn->close();
?>
