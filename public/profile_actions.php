<?php

include("../config/config.php");

if (!isset($_SESSION['user'])) {
    exit("Unauthorized");
}

$fileName = "../db/user.sqlite";
if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
    $fileName = "C:\\db\\user.sqlite";
}
$dsn = "sqlite:$fileName";
$db = new PDO($dsn);

$action = $_POST['action'] ?? $_GET['action'] ?? null;
$acronym = $_SESSION['user']['acronym'];

if ($action === null || $acronym !== $_SESSION['user']['acronym']) {
    exit("Unauthorized");
}

switch ($action) {
    case 'Update':
        $name = $_POST['name'];
        $avatar = $_POST['avatar'];
        $signature = $_POST['signature'];
        $stmt = $db->prepare("UPDATE user SET name = ?, avatar = ?, signature = ? WHERE acronym = ?");
        $stmt->execute([$name, $avatar, $signature, $acronym]);
        break;

    case 'Change Password':
        $new_password = $_POST['new_password'];
        $confirm_new_password = $_POST['confirm_new_password'];
        if ($new_password !== $confirm_new_password) {
            exit('Passwords do not match.');
        }
        $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $db->prepare("UPDATE user SET password = ? WHERE acronym = ?");
        $stmt->execute([$hashedPassword, $acronym]);

        // Set the flash message for successful password change
        $_SESSION['password_change_success'] = "Your password has been successfully changed.";
        break;

    case 'Delete Account':
        $stmt = $db->prepare("DELETE FROM user WHERE acronym = ?");
        $stmt->execute([$acronym]);
        session_destroy();
        session_start();  // Restart the session after destroying it
        $_SESSION['account_deleted'] = "Your account has been successfully deleted.";
        break;

    default:
        exit("Unknown action");
}

header('Location: profile.php?acronym=' . $acronym);
