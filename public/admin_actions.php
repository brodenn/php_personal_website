<?php
include("../config/config.php");


if ($_SESSION['user']['role'] !== 'admin') {
    exit("Unauthorized");
}

$fileName = "../db/user.sqlite";
if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
    $fileName = "C:\\db\\user.sqlite";
}
$dsn = "sqlite:$fileName";
$db = connectToDatabase($dsn);
$action = $_POST['action'] ?? null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($action) {
        case 'Create':
            $acronym = $_POST['new_acronym'];
            $name = $_POST['new_name'];
            $password = $_POST['new_password'];
            $role = $_POST['new_role'];
            $avatar = $_POST['new_avatar'];
            $signature = $_POST['new_signature'];

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare("INSERT INTO user (acronym, name, password, role, avatar, signature) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$acronym, $name, $hashedPassword, $role, $avatar, $signature]);
            echo 'User created successfully.';
            break;

        case 'Confirm Update':
            $original_acronym = $_POST['original_acronym'];
            $update_acronym = $_POST['update_acronym'];
            $update_role = $_POST['update_role'];
            $update_avatar = $_POST['update_avatar'];
            $update_signature = $_POST['update_signature'];

            $stmt = $db->prepare("UPDATE user SET acronym = ?, role = ?, avatar = ?, signature = ? WHERE acronym = ?");
            $stmt->execute([$update_acronym, $update_role, $update_avatar, $update_signature, $original_acronym]);
            echo 'User updated successfully.';
            break;

        case 'Update':
            $acronym = $_POST['acronym'];
            header("Location: admin.php?update_acronym=$acronym");
            exit();


        case 'Delete':
            $acronym = $_POST['acronym'];
            $stmt = $db->prepare("DELETE FROM user WHERE acronym = ?");
            $stmt->execute([$acronym]);
            echo 'User deleted successfully.';
            break;

        default:
            exit("Unknown action");
    }
}

header('Location: admin.php');
?>
<?php include('../view/footer.php');
