<?php
//header.php

$start_time = microtime(true);
$currentFile = basename($_SERVER['PHP_SELF']);
?>


<!doctype html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="referrer" content="unsafe-url">
    <link rel="shortcut icon" href="img/favicon.png" />
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <title>Min websida</title>
</head>

<body>
    <header class="header">
        <img class="logo" src="img/favicon.png" alt="Website Logo">
        <h1 class="website-title">Min websida</h1>
        <h2 class="website-subtitle">Webtec</h2>
    </header>
    <nav class="navbar">
        <ul>
            <li class="<?php echo ($currentFile == 'me.php' ? 'active' : '') ?>"><a href="me.php">Me</a></li>
            <li class="<?php echo ($currentFile == 'report.php' ? 'active' : '') ?>"><a href="report.php">Report</a>
            </li>
            <li class="<?php echo ($currentFile == 'about.php' ? 'active' : '') ?>"><a href="about.php">About</a></li>
            <li class="<?php echo ($currentFile == 'today.php' ? 'active' : '') ?>"><a href="today.php">Today</a></li>
            <li class="<?php echo ($currentFile == 'friday.php' ? 'active' : '') ?>"><a href="friday.php">Är det
                    fredag?</a>
            </li>
            <li class="<?php echo ($currentFile == 'month.php' ? 'active' : '') ?>"><a href="month.php">Kalender</a>
            </li>
            <li class="<?php echo ($currentFile == 'photocal.php' ? 'active' : '') ?>"><a
                    href="photocal.php">Photocal</a>
            </li>
            <li class="<?php echo ($currentFile == 'guessname.php' ? 'active' : '') ?>"><a
                    href="guessname.php">Guessname</a>
            </li>
            <li class="<?php echo ($currentFile == 'session.php' ? 'active' : '') ?>"><a href="session.php">Session</a>
            </li>
            <li class="<?php echo ($currentFile == 'search.php' ? 'active' : '') ?>"><a href="search.php">Search</a>
            </li>
            <?php if (checkIfUserLoggedIn()) : // Function to check if user is logged in ?>
            <li><a href="profile.php">Profile (<?= $_SESSION['user']['name'] ?? 'Unknown' ?>)</a></li>
            <li><a href="logout.php">Logout</a></li>
            
                <?php if (isAdmin($_SESSION['user'])) : // Function to check if user is an admin ?>
                <li><a href="admin.php">Admin</a></li>
                <?php endif; ?>
            
            <?php else : ?>
            <li class="<?php echo ($currentFile == 'login.php' ? 'active' : '') ?>"><a href="login.php">Login</a></li>
            <li class="<?php echo ($currentFile == 'register.php' ? 'active' : '') ?>"><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
