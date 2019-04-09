<?php

define('INC_ROOT', dirname(__DIR__));

/*
** call the configuration
*/
include_once INC_ROOT . '/config.php';

/*
** setup the auto loader function
*/
spl_autoload_register(function($class) {
   $file = INC_ROOT . '/database/class/' . $class . '.php';

  if (file_exists($file)) {

    # include the file once we have file in location
    require_once $file;
  } else {
    die('the class doesnt found!');
  }
});
