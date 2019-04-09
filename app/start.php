<?php
// initialisation file

// seting session
session_cache_limiter(false);
session_start();

// display error (development mode)
ini_set('display_errors', 'On');

// define the include root
define('INC_ROOT', dirname(__DIR__));

// var_dump(INC_ROOT);

require_once 'init.php';

$app = new App;