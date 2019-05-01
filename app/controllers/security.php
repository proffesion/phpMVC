<?php

class Security extends Controller
{


    public function index() {
      echo 'return you to the main page';
      $client = $this->model('Client_m');

    }

    public function token($data,$value = '') {
      switch ($data) {
        case 'generate':
          # check if we only have one aggrument
          (empty($value)) ? $this->tokenGenerate() : $this->index();
          break;
        
        case 'check':
          # call the token
          (!empty($value)) ? $this->tokenCheck($value) : $this->index();
          break;
        
        default:
          $this->index();
          break;
      }
    }

    public function test() {
      $token = $this->model('Security_m');

      $token->other();
    }
    
    public function datas() {
      $token = $this->model('Security_m');

      $token->saveData();
    }


    public function tokenGenerate() {
      $token = $this->model('Security_m');
      return $token->generate_token();
    }

    

    public function tokenCheck($value) {
      $token = $this->model('Security_m');
      return $token->token_check($value);
    }

}
