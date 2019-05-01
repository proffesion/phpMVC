<?php

class Register extends Controller
{
    public function index($name = '')
    {
        $user = $this->model('Register_m');
        $user->name = $name;
        //$user->name;

        $this->view('register', ['name' => $user->name]);
    }


    public function reg() {
    	echo 'the data is'. $_POST['name'];
    }

    public function gtd() {
        $register = $this->model('Register_m');
        $register->getdata();
    }
}
