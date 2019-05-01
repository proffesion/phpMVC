<?php

class Register_m 
{
    private $_db,
            $_data,
            $_table = '';



	private static $_conn = null;



    public function __construct() {
        $this->_db = DB::getInstance(); // DB
    }
    

    public function display() {
        $this->message = "<hr>this is the REGISTER model<hr>";
        return $this->message;
    }


    public function getdata() {
        
        $data = $this->_db;
        $data->def_Query("SELECT * FROM `users` WHERE username = ? AND id = ?", ['janvier',5]);
       /**
        * this will tell the query
        * the fields to be selected
        */
       $data->select([
           'username',
           'id',
           'password'
       ]);
       
       $data->get('users', array('username', '=', 'janvier'));

        if($data->count()) {
            var_dump($data->results());
        } else {
            echo 'No data found';
        }
    }
}