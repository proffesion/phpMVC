<?php

/**
 * The default home controller, called when on controller/method has been passed
 * to the application
 */

class Home extends Controller
{
    /**
     * definition of models variable
     * that will be used
     */
    public $_home;

    public function __construct() {
        /**
         * assign the models variable that will be used
         */
        $this->_home = $this->model('Home_m');
    }

    public function index($name = '', $mood = 'happy')
    {
        $user = $this->model('User_m');
        $user->name = $name;
        //$user->name;
        
        $this->view('home/index', [
            'name' => $user->name,
            'mood' => $mood
        ]);

        $this->_home->display();
        
    }




// $this->view('errors/404');
// public function redirect()
// {
//     Redirect::to('contact');
// }
 

}
