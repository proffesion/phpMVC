<?php

/**
 * these files works with the mvc application
 */
require_once 'core/App.php';
require_once 'core/Controller.php';



// get the configuration
require_once 'config.php';

// load the functions file
include_once 'core/functions/sanatize.php';













spl_autoload_register(function($class) {
	$file = INC_ROOT . '/app/core/classes/' . $class . '.php';

 if (file_exists($file)) {

	 # include the file once we have file in location
	 require_once $file;
 } else {
	 die('the class doesnt found!');
 }

});



























// /**
//  * include the configuration class
//  * this will hep to access the elements in the config
//  */
// include_once INC_ROOT . '/app/database/class/Config.php';




// /**
//  * require the database fule
//  * which works with the query
//  * and the database conneceion
//  */
// require_once 'database/class/DB.php';


// // get Cookies class
// include_once 'database/class/Cookie.php';


// // get the session file
// include_once 'database/class/Session.php';


// // include the validetion
// include_once 'database/class/Validate.php';


// /**
//  * redirect class
//  */
// include_once 'database/class/Redirect.php';
// // Redirect.php
// // load the class file
// /*
// spl_autoload_register(function($class) {
// 	require_once 'classes/' . $class . '.php';
// });
// */