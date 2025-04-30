<?php

include("../config/config.php");
require "../view/header.php";

// Check if the user is an admin
if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle user creation by admin
    $acronym = $_POST['acronym'];
    $password = $_POST['password1'];
    $password2 = $_POST['password2'];
    $role = $_POST['role'];  // Role chosen by admin

    if ($password !== $password2) {
        setFlashMessage('error', 'Passwords do not match.');
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $fileName = "../db/user.sqlite";
        if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
            $fileName = "C:\\db\\user.sqlite";
        }
        $dsn = "sqlite:$fileName";
        $db = connectToDatabase($dsn);

        $stmt = $db->prepare("INSERT INTO user (acronym, password, role) VALUES (?, ?, ?)");
        $stmt->execute([$acronym, $hashedPassword, $role]);

        setFlashMessage('success', 'User created successfully.');
        redirectTo('admin.php');  // Redirect back to admin panel
    }
}

?>

<!-- HTML for the form -->
<form method="POST" action="">
    Acronym: <input type="text" name="acronym"><br>
    Password: <input type="password" name="password1"><br>
    Confirm Password: <input type="password" name="password2"><br>
    Role: 
    <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br>
    <input type="submit" value="Create User">
</form>
