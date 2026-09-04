<?php

namespace App;

use Models\User;

class Auth
{
    public static function check(): bool
    {
        return isset($_SESSION['user']) && !empty($_SESSION['user']);
    }
    public static function user(): array
    {
        return $_SESSION['user'] ?? null;
    }
    public static function login(array $user_data): void
    {
        session_regenerate_id(true);
        $_SESSION['user'] = $user_data;
    }
    public static function logout(): void
    {
        $_SESSION['user'] = null;
        session_regenerate_id(true);
    }
    public static function syncUser(): bool
    {
        if (!self::check()) {
            return false;
        }
        $currentUser = self::user();
        $userId = $currentUser['id'] ?? null;
        if (!$userId) {
            return false;
        }
        $userModle=new User;
        $fresUser=$userModle->selectFindOneBy('id',$userId);
        if (!$fresUser || empty($fresUser)) {
            return false;
        }
        $userData=is_array($fresUser[0] ?? null)? $fresUser[0] :$fresUser;
        self::updateSesston($userData);
        return true;
    }
    private static function updateSesston(array $userData):void{
        $_SESSION['user']=$userData;
    }
}
