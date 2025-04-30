<?php

// change_password.php

include("config/config.php");
require "view/header.php";

$user = checkIfUserLoggedInOrRedirectToLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle password change
}

?>

<!-- HTML form for changing password -->

// Get the header with the navbar
require "view/header.php";

// Include the view with a form
require "view/change_password.php";
<?php include('../view/footer.php') ?>
