<?php

namespace Controllers;

use App\Auth;
use App\Controller;
use App\Request;
use Services\AuthService;

class DashboardController extends Controller
{
    private ?AuthService $authService = null;
    public function __construct()
    {
        $this->layout = 'admin';
        $this->authService ??= new AuthService();
    }
    public function index(Request $request)
    {
        $role=$this->authService->roleNmae();
        return $this->view("dashboard",['role'=>$role]);
    }
    public function logout()
    {
        Auth::logout();
        $this->redirectTo('login');
    }
}
