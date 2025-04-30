<?php

//connectFunc.php
require "src/database.php";

// Connect to the database
$fileName = "C:\db\db.sqlite";
$dsn = "sqlite:$fileName";
$db = connectToDatabase($dsn);

// Print out the success
echo "<p>The database at '$dsn' is now connected.<p>Dumping the database connection:<pre>";
var_dump($db);
