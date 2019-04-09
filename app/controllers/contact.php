<?php

class Contact extends Controller
{
    public function index() {
        $this->view('contact');
        // echo 'index contacts';

        // $user = new User($username);
        // if (!$user->exists(404)) {
        //     Redirect::to(404);
        // } else {
        //     $data = $user->data();
        // }
    

    }

    public function phone() {
        echo 'Phone Contact';
    }

    // public function register() {
    //     $this->view('register');
    // }
}
