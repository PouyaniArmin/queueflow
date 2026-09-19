<?php

namespace Controllers;

use App\Auth;
use App\Controller;
use App\Request;
use Models\Appointment;
use Models\Service;
use Services\AuthService;

class DashboardController extends Controller
{
    private ?AuthService $authService = null;
    private ?int $userId;
    public function __construct()
    {
        $this->layout = 'admin';
        $this->authService ??= new AuthService();
        $user = Auth::user();
        $this->userId = $user['id'];
    }
    public function index(Request $request)
    {
        $app = new Appointment;
        $today = $app->todayForUser($this->userId);
        $role = $this->authService->roleNmae();
        $serviceModle=new Service;
        $service=$serviceModle->forUser($this->userId);
        $data=$app->forUser($this->userId);
        return $this->view("dashboard", ['role' => $role, 'today' => $today,'data'=>$data,'service'=>$service]);
    }
    public function logout()
    {
        Auth::logout();
        $this->redirectTo('login');
    }
}
