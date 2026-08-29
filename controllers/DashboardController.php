<?php
namespace Controllers;

use App\Auth;
use App\Controller;
use App\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $this->layout='admin';
        return $this->view("dashboard");
    }
    public function logout(){
        Auth::logout();
        $this->redirectTo('login');
    }
}