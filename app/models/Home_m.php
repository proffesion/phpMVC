<?php
class Home_m
{
  public function display() {
     $hash = Hash::password('janvier');
     $check = Hash::password_check('janvier', $hash);
    //  var_dump($check);
  }
}
