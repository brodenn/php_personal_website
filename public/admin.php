<?php
include("../config/config.php");
include('../view/header.php');

if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}


$fileName = "../db/user.sqlite";
if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
    $fileName = "C:\\db\\user.sqlite";
}
$dsn = "sqlite:$fileName";

$db = new PDO($dsn);

$stmt = $db->prepare("SELECT * FROM user");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Admin Panel</h1>

<h3>Create New User</h3>
<form method="POST" action="admin_actions.php">
    Acronym: <input type="text" name="new_acronym" required><br>
    Name: <input type="text" name="new_name" required><br>
    Password: <input type="password" name="new_password" required><br>
    Role:
    <select name="new_role" required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br>
    Avatar: <input type="text" name="new_avatar"><br>
    Signature: <input type="text" name="new_signature"><br>
    <input type="submit" name="action" value="Create">
</form>

<table border="1">
    <thead>
        <tr>
            <th>Acronym</th>
            <th>Name</th>
            <th>Role</th>
            <th>Avatar</th>
            <th>Signature</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['acronym']; ?></td>
                <td><a href="profile.php?acronym=<?= $user['acronym']; ?>"><?= $user['name']; ?></a></td>
                <td><?= $user['role']; ?></td>
                <td><?= $user['avatar']; ?></td>
                <td><?= $user['signature']; ?></td>
                <td>
                    <form action="admin_actions.php" method="POST">
                        <input type="hidden" name="acronym" value="<?= $user['acronym']; ?>">
                        <input type="submit" name="action" value="Delete">
                        <input type="submit" name="action" value="Update">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php if (isset($_GET['update_acronym'])) : ?>
    <h3>Update User</h3>
    <form method="POST" action="admin_actions.php">
        New Acronym: <input type="text" name="update_acronym" value="<?= $_GET['update_acronym']; ?>"><br>
        New Role:
        <select name="update_role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br>
        New Avatar: <input type="text" name="update_avatar"><br>
        New Signature: <input type="text" name="update_signature"><br>
        <input type="hidden" name="original_acronym" value="<?= $_GET['update_acronym']; ?>">
        <input type="submit" name="action" value="Confirm Update">
    </form>
<?php endif; ?>
<?php include('../view/footer.php') ?>
