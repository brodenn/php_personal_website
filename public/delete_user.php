<?php

// delete_user.php

include("config/config.php");
require "view/header.php";

$user = checkIfUserLoggedInOrRedirectToLogin();
?>

<form method="post" action="delete_user_process.php">
    <input type="submit" value="Delete Account">
</form>
