<?php

include("../config/config.php");

unset($_SESSION['user']);
redirectTo('login.php');
