<?php

class Client extends Controller
{
    public function index($username = '') {
      // create the object from the models
      $user = $this->model('Client');
        echo 'This is the home page';
        if (!empty($username)) {
            # code...
            // $user = new User($username);
            
            // if ($user->exists()) {
            //     # code...
            //     echo '<br>Username: '.$user->data()->username;
            //     echo '<br>joined: '.$user->data()->joined;
            //     echo '<br>name: '.$user->data()->name;
                
            // } else {
            //     echo "$username doesnt found in the system";
            // }
            

            // $register = $this->model('Register');
            // echo '<br>'.$register->display();
            
        }
    }

    private function all() {
      echo 'hahahhahaha';
    }

    private function clientone($id) {
      echo 'this is the id: '. $id;
    }

    public function json($type = '',$value = '') {
      if ($type == 'all') {
        return $this->all();
      } elseif ($type == 'client') {
        return $this->clientone($value);
      }
    }

}
