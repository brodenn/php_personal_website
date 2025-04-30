<?php

//delete_user_as_admin_process.php

include("../config/config.php");

$currentUser = checkIfUserLoggedInOrRedirectToLogin();

// Check if the user has an admin role
if (!isAdmin($currentUser)) {
    exit("Unauthorized");
}

$userIdToDelete = $_POST['userId'];

// Connect to the database (update the function as needed)
$fileName = "../db/user.sqlite";
if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
    $fileName = "C:\\db\\user.sqlite";
}
$dsn = "sqlite:$fileName";
$db = connectToDatabase($dsn);

$stmt = $db->prepare("DELETE FROM user WHERE id = ?");
$stmt->execute([$userIdToDelete]);

setFlashMessage('success', 'User deleted successfully.');
redirectTo('admin.php');
