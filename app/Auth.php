<?php
namespace App;

class Auth{
    public static function check():bool{
        return isset($_SESSION['user']) && !empty($_SESSION['user']);
    }
    public static function user():array{
        return $_SESSION['user'] ?? null;
    } 
    public static function login(array $user_data):void{
        session_regenerate_id(true);
        $_SESSION['user']=$user_data;
    }
    public static function logout():void{
        $_SESSION['user']=null;
        session_regenerate_id(true);
    }
}