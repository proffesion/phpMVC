<?php

class Register extends Controller
{
    public function index($name = '')
    {
        $user = $this->model('User');
        $user->name = $name;
        //$user->name;

        $this->view('register', ['name' => $user->name]);
    }


    public function reg() {
    	echo 'the data is'. $_POST['name'];
    }

}
