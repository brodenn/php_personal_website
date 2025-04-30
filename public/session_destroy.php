<?php

//session_destroy.php
include('../config/config.php');

// Nu kan du använda destroySession() funktionen
destroySession();

// Redirect to the session page
header("Location: session.php");

exit();
