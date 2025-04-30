<?php

// Enable error reporting
// process_guess.php

// Start the session
session_start();
// Get the user's guessed name from the POST data
$guessedName = $_POST['guessedName'];

// Get the correct name and hint letter from the session
$randomName = $_SESSION['randomName'];
$hintLetter = $_SESSION['hintLetter'];

// Check if the guessed name matches the correct name
if (strtolower($guessedName) == strtolower($randomName)) {
    $message = "Congratulations! You guessed the correct name.";
} else {
    $message = "Sorry, your guess was incorrect. The correct name was: $randomName (Hint: Starts with '$hintLetter')";
}

// Store the result message in a flash message
$_SESSION['message'] = $message;

print_r($_SESSION); // debug


// Redirect to the result page
header("Location: result.php");
