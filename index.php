<?php
// Redirect to homepage if the user is already logged in
session_start();
if (isset($_SESSION['username'])) {
    header("Location: homepage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In or Sign Up</title>
</head>
<body>
    <?php include 'signin_signup.html'; ?>
</body>
</html>
