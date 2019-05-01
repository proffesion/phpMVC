<?php

class Profile extends Controller
{
    public function index($username = 'janvier') {
        // create the object from the models
        if (!empty($username)) {
            # code...
            $user = $this->model('User_m');
            $user->user($username);

            if ($user->exists()) {
                # code...
                echo '<br>Username: '.$user->data()->username;
                echo '<br>joined: '.$user->data()->joined;
                echo '<br>name: '.$user->data()->name;
                
            } else {
                echo "$username doesnt found in the system";
            }
            

            $register = $this->model('Register_m');
            echo '<br>'.$register->display();

            $profile = $this->model('Profile_m');
            echo '<br>'.$profile->display();
            
        } else {
            echo 'no user set here';
        }
    }

    public function see() {
        echo Token::generate();
    }

}
