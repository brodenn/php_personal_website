<?php
// result.php
// Start the session
session_start();

// Your existing code to fetch $message and display goes here


// Get the result message from the session
$message = $_SESSION['message'];

// Get the result message from the session
$message = $_SESSION['message'];
if (isset($_SESSION['hintLetter'])) {
    $hintLetter = $_SESSION['hintLetter'];
} else {
    $hintLetter = 'unknown'; // or some other default value
    $message = str_replace("(Hint: Starts with '')", "(Hint information missing)", $message); // replace the blank hint in the message with a placeholder
}


include('../config/config.php');

include('../view/header.php');
?>

<div class="guess-container">
    <h1 class="result-message">
        <?php echo $message; ?>
    </h1>
    <a class="play-again-link" href="guessname.php">Play Again</a>
</div>

<?php include('../view/footer.php') ?>
