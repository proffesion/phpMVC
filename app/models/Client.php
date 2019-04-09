<?php
class Client
{
    private $_db,
            $_data,
            $_table = 'users'; // table name

    private static $_conn = null;


    public function __construct($user = null) {
        $this->_db = DB::getInstance(); // DB
    }


    public function create($fields = array()) {
        if(!$this->_db->insert($this->_table, $fields)) {
            throw new Exception('There was a problem creating an account.');
        }
    }

    public function update($fields = array(), $id = null) {

        if (!$id && $this->isLoggedIn()) {
            $id = $this->data()->id;
        }

        if (!$this->_db->update($this->_table, $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }

    /* set this function to search from datas */
    // public function find($user = null) {
    //     if ($user) {
    //         $field = (is_numeric($user)) ? 'id' : 'username';
    //         $data = $this->_db->get($this->_table, array($field, '=', $user));

    //         if ($data->count()) {
    //             $this->_data = $data->first();
    //             return true;
    //         }
    //     }
    //     return false;
    // }

    // check whether the data exists in the data array
    public function exists() {
        return (!empty($this->_data)) ? true : false;
    }

    public function data() {
        return $this->_data;
    }

}
