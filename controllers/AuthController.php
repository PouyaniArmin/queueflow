<?php 

namespace Controllers;

use App\Controller;

class AuthController extends Controller{
    public function index(){
        return $this->view('login');
    }
    public function register(){
        return $this->view('register');
    }
}