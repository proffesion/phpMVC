<?php

class Register 
{
    public $name;
    public $message;

    
    public function display() {
        $this->message = "this is to make sure that everything works well";
        return $this->message;
    }
}