

<?php

// update_profile.php
include("config/config.php");
require "view/header.php";

$user = checkIfUserLoggedInOrRedirectToLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle user profile update
    $name = $_POST['name'];
    $avatar = $_POST['avatar'];
    $signature = $_POST['signature'];

    $fileName = "../db/user.sqlite";
    if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
        $fileName = "C:\\db\\user.sqlite";
    }
    $dsn = "sqlite:$fileName";
    $db = connectToDatabase($dsn);

    $stmt = $db->prepare("UPDATE user SET name = ?, avatar = ?, signature = ? WHERE acronym = ?");
    $stmt->execute([$name, $avatar, $signature, $user]);

    setFlashMessage('success', 'Profile updated successfully.');
    redirectTo('profile.php');
}
?>

<!-- Existing form can be re-used for profile updating -->
