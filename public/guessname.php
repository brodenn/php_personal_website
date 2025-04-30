<?php
// guessname.php

// Start the session
session_start();
// Include calendar.php to access the name-meaning array
include '../src/calendar.php';

// Get the array with name meanings
$nameMeanings = getNameExplanation();

// Randomly select a name and its meaning
$randomName = array_rand($nameMeanings);
$randomMeaning = $nameMeanings[$randomName];

// Store the random name and its first letter in session variables
$_SESSION['randomName'] = $randomName;
$_SESSION['hintLetter'] = substr($randomName, 0, 1);

// Get the hint letter from the session (now it will be set for sure)
$hintLetter = $_SESSION['hintLetter'];

include('../config/config.php');

include('../view/header.php');
?>

<div class="guess-container">
    <h1 class="guess-name">Guess the Name Game</h1>
    <p>What name is associated with the following meaning?</p>
    <p><strong><?php echo $randomMeaning; ?></strong></p>

    <!-- Display the hint letter -->
    <p>Hint: The name starts with the letter "<?php echo $hintLetter; ?>"</p>

    <form class="guess-form" action="process_guess.php" method="POST">
        <label for="guessedName">Your Guess:</label>
        <input type="text" id="guessedName" name="guessedName" required>
        <button type="submit">Submit</button>
    </form>
</div>

<?php include('../view/footer.php') ?>
