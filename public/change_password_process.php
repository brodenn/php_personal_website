<?php

// change_password_process.php

include("config/config.php");

$user = checkIfUserLoggedInOrRedirectToLogin();

$newPassword1 = $_POST['password_new1'];
$newPassword2 = $_POST['password_new2'];

if ($newPassword1 !== $newPassword2) {
    setFlashMessage('error', 'Passwords do not match.');
    redirectTo('change_password.php');
} else {
    $hashedPassword = password_hash($newPassword1, PASSWORD_DEFAULT);

// Connect to the database (update the function as needed)
    $fileName = "../db/user.sqlite";
    if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
        $fileName = "C:\\db\\user.sqlite";
    }
    $dsn = "sqlite:$fileName";
    $db = connectToDatabase($dsn);


    $stmt = $db->prepare("UPDATE user SET password = ? WHERE acronym = ?");
    $stmt->execute([$hashedPassword, $user]);

    setFlashMessage('success', 'Password updated successfully.');
    redirectTo('profile.php');
}
