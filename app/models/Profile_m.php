<?php

class Profile_m
{
    public $name;
    public $message;

    
    public function display() {
        $this->message = "<hr>this is the PROFILE model<hr>";
        return $this->message;
    }
}