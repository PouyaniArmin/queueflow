<?php 

namespace Controllers;

use App\Controller;
use App\Request;

class AuthController extends Controller{
    public function index(){
        return $this->view('login');
    }
    public function register(){
        return $this->view('register');
    }
}