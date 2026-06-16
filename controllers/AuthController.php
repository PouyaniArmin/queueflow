<?php

namespace Controllers;

use App\Controller;
use App\Request;
use Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return $this->view('login');
    }
    public function register()
    {
        return $this->view('register');
    }
    public function login(Request $request) {
        var_dump($request->all());
        return "Login";
    }
    public function registerUser(Request $request)
    {
        $request = $request->all();
        $user = new User;
        $countrCode = $request['country_code'];
        $pohne = $request['phone'];
        $fullPhoneNumber = $countrCode . $pohne;
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password_hash' => $request['password'],
            'phone' => $fullPhoneNumber,
            'role_id' => 1
        ];
        var_dump($data);
        $user->insert($data);
        return "insert To database";
    }
}
