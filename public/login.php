<?php

// login.php
include("../config/config.php");
require("../view/header.php");

// Check for account deletion confirmation
if (isset($_SESSION['account_deleted'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['account_deleted'] . "</div>";
    unset($_SESSION['account_deleted']);
}

// Add this part to display flash message for incorrect password
if (isset($_SESSION['error_message'])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
    unset($_SESSION['error_message']); // Remove the message from session
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acronym = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database (update the function as needed)
    $fileName = "../db/user.sqlite";
    if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
        $fileName = "C:\\db\\user.sqlite";
    }
    $dsn = "sqlite:$fileName";
    $db = connectToDatabase($dsn);

    $stmt = $db->prepare("SELECT * FROM user WHERE acronym = ?");
    $stmt->execute([$acronym]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        // Removed 'setFlashMessage' function as it's not defined in your code.
        // You can set session variables directly.
        $_SESSION['success_message'] = 'Successfully logged in.';
        header('Location: profile.php');
        exit();
    } else {
        // Set a flash message for incorrect password
        $_SESSION['error_message'] = 'Invalid credentials.';
    }
}
?>

<form method="post">
    <label>Username:
        <input type="text" name="username">
    </label>
    <label>Password:
        <input type="password" name="password">
    </label>
    <button type="submit">Login</button>
</form>
