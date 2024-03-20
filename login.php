<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user exists and the password matches (replace with your own logic)
    $accounts = json_decode(file_get_contents('accounts.json'), true);
    if (isset($accounts[$username]) && password_verify($password, $accounts[$username]['password'])) {
        // Authentication successful
        $_SESSION['username'] = $username;

        // Set a persistent cookie for 30 days
        setcookie('loggedIn', true, time() + (86400 * 30), '/');
        
        echo json_encode(['success' => true]);
    } else {
        // Authentication failed
        echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
    }
} else {
    // Redirect or display an error message if accessed directly
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>
