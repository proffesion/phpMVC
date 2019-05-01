<?php
class Hash
{
    public static function make($string, $salt = '') {
        return hash('sha256', $string . $salt);
    }

    public static function salt($length) {
        return random_bytes($length);
    }

    public static function unique() {
        return self::make(uniqid());
    }

    public static function password($password) {
        return password_hash(
            $password, 
            Config::get('hash/algo'),
            ['cost' => Config::get('hash/cost')]
        );
    }

    public static function password_Check($password, $hash) {
        return password_verify($password, $hash);
    }

    
}
