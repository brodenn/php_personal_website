<?php

// update_profile_process.php

include("config/config.php");

$user = checkIfUserLoggedInOrRedirectToLogin();
$new_name = $_POST['name'];
$new_avatar = $_POST['avatar'];
$new_signature = $_POST['signature'];

// Connect to the database (update the function as needed)
$fileName = "../db/user.sqlite";
if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
    $fileName = "C:\\db\\user.sqlite";
}
$dsn = "sqlite:$fileName";
$db = connectToDatabase($dsn);

$stmt = $db->prepare("UPDATE user SET name = ?, avatar = ?, signature = ? WHERE acronym = ?");
$stmt->execute([$new_name, $new_avatar, $new_signature, $user]);

setFlashMessage('success', 'Profile updated successfully.');
redirectTo('profile.php');
