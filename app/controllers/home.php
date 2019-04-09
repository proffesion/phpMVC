<?php

class Home extends Controller
{

public function index($name = '')
{
    $user = $this->model('User');
    $user->name = $name;
    //$user->name;
    
    $this->view('home/index', ['name' => $user->name]);
    // $this->view('errors/404');
    // $this->disp();

    // $this->redirect();
}

public function redirect()
{
    Redirect::to('contact');
}
 

}
