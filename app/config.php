<?php
// all the configuration of the system

$GLOBALS['config'] = array(
	'mysql' => array(
		'host'     => '127.0.0.1',
		'username' => 'root',
		'password' => '',
		'db'       => 'lr_db'
	),
	'remember' => array(
		'cookie_name'   => 'hash',
		'cookie_expiry' => 604800
	),
	'session' => array(
		'session_name' => 'user',
		'token_name'   => 'token'
	),
	'hash' => array(
		'algo' => PASSWORD_BCRYPT,
		'cost' => 10	
	)
);

