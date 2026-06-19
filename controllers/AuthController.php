<?php

namespace Controllers;

use App\Controller;
use App\Request;
use Models\User;
use Services\AuthService;

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
       $request=$request->all();
        $auth=new AuthService();
        return $auth->authenticate($request['email'],$request['password']);
        
    }
    public function registerUser(Request $request)
    {
        $auth=new AuthService;
        return $auth->signup($request);
    
    }
}
