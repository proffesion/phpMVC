<?php
// initialisation file

// seting session
session_cache_limiter(false);
session_start();

// display error (development mode)
ini_set('display_errors', 'On');

// define the include root
define('INC_ROOT', dirname(__DIR__));


require_once 'init.php';
