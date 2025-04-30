<?php
// profile.php
include("../config/config.php");
require("../view/header.php");

// Check for account deletion confirmation
if (isset($_SESSION['account_deleted'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['account_deleted'] . "</div>";
    unset($_SESSION['account_deleted']);  // Remove the message from session
}

// Add this part to display flash message for successful password change
if (isset($_SESSION['password_change_success'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['password_change_success'] . "</div>";
    unset($_SESSION['password_change_success']);  // Remove the message from session
}
$fileName = "../db/user.sqlite";
if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
    $fileName = "C:\\db\\user.sqlite";
}
$dsn = "sqlite:$fileName";
$db = new PDO($dsn);

$acronym = $_GET['acronym'] ?? $_SESSION['user']['acronym'];

$stmt = $db->prepare("SELECT * FROM user WHERE acronym = ?");
$stmt->execute([$acronym]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    exit('User not found.');
}
?>

<h1 class="center-title"><?= $user['name']; ?>'s Profile</h1>
<p>Acronym: <?= $user['acronym']; ?></p>
<p>Role: <?= $user['role']; ?></p>
<p>Avatar: <?= $user['avatar']; ?></p>
<p>Signature: <?= $user['signature']; ?></p>

<?php if (isset($_SESSION['password_change_success']) && $_SESSION['password_change_success']) : ?>
    <p>Password changed successfully!</p>
    <?php unset($_SESSION['password_change_success']); ?>
<?php endif; ?>

<?php if ($acronym === $_SESSION['user']['acronym']) : ?>
    <form method="POST" action="profile_actions.php">
    <input type="hidden" name="action" value="Delete Account">
    <input type="hidden" name="acronym" value="<?= $_SESSION['user']['acronym'] ?>">  <!-- Add this line -->
    <input type="submit" value="Delete Account">
</form>


    <h3>Update Profile</h3>
    <form method="POST" action="profile_actions.php">
        Name: <input type="text" name="name" value="<?= $user['name']; ?>"><br>
        Avatar: <input type="text" name="avatar" value="<?= $user['avatar']; ?>"><br>
        Signature: <input type="text" name="signature" value="<?= $user['signature']; ?>"><br>
        <input type="hidden" name="acronym" value="<?= $user['acronym']; ?>">
        <input type="submit" name="action" value="Update">
    </form>

    <h3>Change Password</h3>
    <form method="POST" action="profile_actions.php">
        New Password: <input type="password" name="new_password"><br>
        Confirm New Password: <input type="password" name="confirm_new_password"><br>
        <input type="hidden" name="acronym" value="<?= $user['acronym']; ?>">
        <input type="submit" name="action" value="Change Password">
    </form>
<?php endif; ?>

<?php include('../view/footer.php') ?>
