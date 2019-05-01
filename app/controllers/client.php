<?php

class Client extends Controller
{
    public function index() {
      echo 'welcome to the client form';
      $client = $this->model('Client_m');

    }

    public function all() {
      // $client = $this->model('Client_m');
      // $client->display();


      $register = $this->model('Register_m');
      $register->getdata();

    }


}
