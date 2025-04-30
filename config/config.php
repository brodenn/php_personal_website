<?php

// config.php
// Report all type of errors
error_reporting(-1);

// Display all errors
ini_set('display_errors', '1');

// Start the named session, if not already started
$name = preg_replace("/[^a-z\d]/i", "", __DIR__);

if (session_status() == PHP_SESSION_NONE) {
    session_name($name);
    session_start();
}

// Include the functions.php file
include("../src/functions.php");

// Include the database.php file
include("../src/database.php");
