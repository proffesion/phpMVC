<?php

class Controller 
{

    public function model($model)
    {
        if (file_exists('app/models/' . $model . '.php')) {
            /**
             * load the model once if there
             */
            require_once 'app/models/' . $model . '.php';
            // echo 'model found';
        } else {
            die('the model doesnt found');
        }


        // create an object for that
        return new $model;


    }

    public function view($view, $data = [])
    {
        // check if it found in the html document
        if(file_exists('app/views/' . $view . '.php')) {
            
            /**
             * include the header of the view
             **/ 
            require_once 'app/views/includes/header.php';

            /**
             * include the view contents
             */
            require_once 'app/views/' . $view . '.php';

            /**
             * include the footer of the view
             **/ 
            $scriptModel = $this->includeJs($view);

            require_once 'app/views/includes/footer.php';

        } else {

            // begin showing error
            // die('file doesnt found');

            header('HTTP/1.0 404 Not Found');
            include_once 'app/views/errors/404.php';
            exit();
        
        }
    }

    public function includeJs($view) {
        if ($view == 'home/index') {
            $view = 'index';
        }

        if (file_exists(INC_ROOT.'/appJs/models/'. $view .'.js')) {

            return '<script src="appJs/models/' . $view . '.js"></script>';
        }

        return true;
    }
}

