<?php

class Profile extends Controller
{
    public function index($username = '') {
        // create the object from the models
        if (!empty($username)) {
            # code...
            $user = $this->model('User');
            $user = new User($username);
            
            if ($user->exists()) {
                # code...
                echo '<br>Username: '.$user->data()->username;
                echo '<br>joined: '.$user->data()->joined;
                echo '<br>name: '.$user->data()->name;
                
            } else {
                echo "$username doesnt found in the system";
            }
            

            $register = $this->model('Register');
            echo '<br>'.$register->display();
            
        }
    }

}
