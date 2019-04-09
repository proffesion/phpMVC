<?php

class Controller 
{

    public function model($model)
    {
        if (file_exists('app/models/' . $model . '.php')) {
            require_once 'app/models/' . $model . '.php';
        } else {
            die('the model doesnt found');
        }

        // create an object for that
        return new $model();
    }

    public function view($view, $data = [])
    {
        // check if it found in the html document
        if(file_exists('app/views/' . $view . '.php')) {
            require_once 'app/views/' . $view . '.php';
        } else {

            // begin showing error
            // die('file doesnt found');

            header('HTTP/1.0 404 Not Found');
            include_once 'app/views/errors/404.php';
            exit();
        
        }
    }
}

// C:\xampp\htdocs\mvcfull\app/views/errors/404.php