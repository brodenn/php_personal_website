<?php

// do_register.php

// Include the database config file (update the path as needed)
include("../config/config.php");
require("../view/header.php");

// Connect to the database (update the function as needed)
// Create a DSN for the database using its filename
$fileName = "../db/user.sqlite";
if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
    $fileName = "C:\\db\\user.sqlite";
}
$dsn = "sqlite:$fileName";
$db = connectToDatabase($dsn);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Basic validation
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['name'])) {
        echo "All fields are required.";
        exit;
    }

    $acronym = $_POST['username'];  // Here $username is changed to $acronym
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password
    $name = $_POST['name'];

    // Prepare an SQL statement to insert new user data into the database
    try {
        // Updated SQL query to use acronym instead of username
        $stmt = $db->prepare("INSERT INTO user (acronym, password, name, role) VALUES (?, ?, ?, 'user')");


        // Execute the SQL statement
        if ($stmt->execute([$acronym, $password, $name])) {
            echo "New user registered successfully!";
        } else {
            echo "Failed to register user.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
} else {
    echo "No POST data received.";
}
