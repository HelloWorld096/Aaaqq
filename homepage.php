<?php
session_start();
if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to signin_signup.html
    header("Location: signin_signup.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h1>Welcome to the Homepage</h1>
    <!-- Display user-specific content here -->
    <div id="userContent"></div>
    <!-- Buttons for changing password and logging out -->
    <button onclick="changePassword()">Change Password</button>
    <button onclick="logout()">Logout</button>

    <script>
        // JavaScript for homepage functionality (e.g., displaying user-specific content)
        // You can use JavaScript to fetch user-specific data and display it here
        // For example, you can use AJAX to fetch data from a server-side script
        
        // Function to change the user's password
        function changePassword() {
            // Implement password change logic here
        }
        
        // Function to log the user out
        function logout() {
            // Clear session and redirect to signin_signup.html
            <?php
            // Clear the session
            session_unset();
            session_destroy();

            // Clear the cookie
            setcookie('loggedIn', '', time() - 3600, '/');
            ?>

            // Redirect to signin_signup.html
            window.location.href = "signin_signup.html";
        }
    </script>
</body>
</html>
