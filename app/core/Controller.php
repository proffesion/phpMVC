<?php

class Controller 
{

    public function model($model)
    {
        /// !- check if the file exist
        require_once '../app/models/' . $model . '.php';

        // create an object for that
        return new $model();
    }

    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
}