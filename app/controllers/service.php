<?php

class Service extends Controller
{
    public function index($name = '')
    {
        $user = $this->model('Register_m');
        $user->name = $name;

        $this->view('service', ['service' => $name]);
    }

}
