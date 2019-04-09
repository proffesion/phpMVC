<?php
/*
** the gate way
** of all json data
*/
include_once 'json_head.php';


$user = new User_db('janvier');
var_dump($user->data()->username);