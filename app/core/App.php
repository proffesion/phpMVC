<?php

class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // the url from parseUrl()
        $url = $this->parseUrl();

        if (file_exists('../app/controllers/' . $url[0] . '.php'))
        {
            $this->controller = $url[0];
            unset($url[0]);
        }

        // require the controller
        require_once '../app/controllers/' .$this->controller . '.php';

        /*
        *create an object 
        *and pace it in the same variable
        *accoding to its name
        */
        $this->controller = new $this->controller;

        // check if the second parameter is passed
        // method
     
        if (@method_exists($this->controller, $url[1])) 
        {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];

        // this function will call the method
        // or a controller 
        call_user_func_array([$this->controller, $this->method], $this->params);

    }



    public function parseUrl()
    {
        if (isset($_GET['url'])) 
        {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));    
        }
    }
}
