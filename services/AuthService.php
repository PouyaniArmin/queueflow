<?php

namespace Services;

use App\Auth;
use App\Request;
use Models\User;

class AuthService
{
    private ?User $user = null;
    public function __construct()
    {
        $this->user = new User;
    }
    public function authenticate(string $email, string $password):bool
    {

        $user = $this->user->findByEmail($email);
        
        if (!$user || empty($user)) {
            return false;
        }
        $password_hash = $user[0]['password_hash'];
        
        if (password_verify($password, $password_hash)) {
            Auth::login($user[0]);
            return true;
            
        }  
        return false;
        
    }
    public function signup(Request $request)
    {
        $request = $request->all();
        if (!$this->user->findByEmail($request['email'])) {
            $country_code = $request['country_code'];
            $phone = $request['phone'];
            $fullPhoneNumber = $country_code . $phone;
            $data = [
                'name' => $request['name'],
                'email' => $request['email'],
                'password_hash' => password_hash($request['password'], PASSWORD_DEFAULT),
                'phone' => $fullPhoneNumber,
                'role_id' => 1
            ];
            $this->user->insert($data);
            return "Register User";
        }
        return "Account Exists";
    }

}
