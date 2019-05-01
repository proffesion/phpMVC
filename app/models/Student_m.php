<?php

class Student_m
{
  public $name;
  public $message;

  
  public function display() {
      $this->message = "<hr>this is the STUDENT model<hr>";
      return $this->message;
  }
}
