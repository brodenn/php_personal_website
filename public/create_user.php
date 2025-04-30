<?php

// create_user.php

include("config/config.php");
require "view/header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle user creation
    $acronym = $_POST['acronym'];
    $password = $_POST['password1'];
    $password2 = $_POST['password2'];

    if ($password !== $password2) {
        setFlashMessage('error', 'Passwords do not match.');
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $fileName = "../db/user.sqlite";
        if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
            $fileName = "C:\\db\\user.sqlite";
        }
        $dsn = "sqlite:$fileName";
        $db = connectToDatabase($fileName);


        $stmt = $db->prepare("INSERT INTO user (acronym, password) VALUES (?, ?)");
        $stmt->execute([$acronym, $hashedPassword]);

        setFlashMessage('success', 'User created successfully.');
        redirectTo('login.php');
    }
}
?>

<!-- Your existing form code for user creation is good to go -->
