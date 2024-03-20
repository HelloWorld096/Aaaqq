<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve new username and password from the form
    $newUsername = $_POST['newUsername'];
    $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT); // Encrypt password
    
    // Check if the username already exists (replace with your own logic)
    $accounts = json_decode(file_get_contents('accounts.json'), true);
    if (isset($accounts[$newUsername])) {
        // Username already exists
        echo json_encode(['success' => false, 'message' => 'Username already exists']);
    } else {
        // Create new account
        $accounts[$newUsername] = ['password' => $newPassword];
        file_put_contents('accounts.json', json_encode($accounts));
        echo json_encode(['success' => true]);
    }
} else {
    // Redirect or display an error message if accessed directly
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>
