<?php

// logout_process.php

session_start();

session_destroy();
setFlashMessage('success', 'You have been logged out.');
redirectTo('index.php');
