<?php

// user.php

// Include the config file
include("config/config.php");

// Check if user is logged in or redirect to login
$user = checkIfUserLoggedInOrRedirectToLogin();

// Get the header with the navbar
require "view/header.php";

$fileName = "../db/user.sqlite";
if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
    $fileName = "C:\\db\\user.sqlite";
}
$dsn = "sqlite:$fileName";
$db = connectToDatabase($fileName);

// Create the SQL statement
$sql = <<<EOD
SELECT
    rowid,
    acronym,
    name,
    role,
    avatar,
    signature
FROM user
WHERE
    acronym = ?
;
EOD;

// Prepare the SQL statement so it can be executed
$stmt = $db->prepare($sql);

// Execute the SQL statement towards the database
$args = [$user];
$stmt->execute($args);

// Get the resultset
$res = $stmt->fetch();

// Include the view that shows the row
require "view/user.php";
