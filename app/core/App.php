<?php

class App
{
    /**
     * these are the default settings
     * to redirect us to the home if 
     * passed url is invalid 
     */
    protected $controller = 'home';
    protected $method = 'index';

    // this will store the parametter
    protected $params = [];



    
    public function __construct()
    {
        // the url from parseUrl()
        $url = $this->parseUrl();

        /**
         * prevent to change the default url 
         * if we dont have the invalid url
         */
        if (file_exists('app/controllers/' . $url[0] . '.php'))
        {
            // if it exists we need to set the url
            $this->controller = $url[0];
            
            // and remove it from the arrat
            unset($url[0]);
        }

        // require the controller
        require_once 'app/controllers/' .$this->controller . '.php';

        /*
        *create an object 
        *and pace it in the same variable
        *accoding to its name
        */
        $this->controller = new $this->controller;



        /**
         * check if the second parameter is passed
         * method
         */
        if (isset($url[1])) {
            
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // this will prevent the error
        // once we have a url which hoesnt have the parameters
 
        $this->params = $url ? array_values($url) : [];




        /**
         * This will call the method of a conroller
         * once it is available
         */
        @call_user_func_array([$this->controller, $this->method], $this->params);

    }





    /**
     * this will expode and trimming the sanatized URL
     */
    public static function parseUrl()
    {
        /**
         * the GET[url]
         * is passed through the HTACCESS
         * to configure it
         */
        if (isset($_GET['url'])) 
        {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            // echo $url;    
        }
    }
}
