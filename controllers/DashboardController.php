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
    // public function index(Request $request)
    // {
    //     $app = new Appointment;
    //     $today = $app->todayForUser($this->userId);
    //     $role = $this->authService->roleNmae();
    //     $serviceModle=new Service;
    //     $service=$serviceModle->forUser($this->userId);
    //     $data=$app->forUser($this->userId);
    //     return $this->view("dashboard", ['role' => $role, 'today' => $today,'data'=>$data,'service'=>$service]);
    // }
    public function index(Request $request)
    {
        $app = new Appointment;
        $today = $app->todayForUser($this->userId);
        $role = $this->authService->roleNmae();

        $serviceModel = new Service;
        $service = $serviceModel->forUser($this->userId);
        $data = $app->forUser($this->userId);

        $customerModel = new \Models\Customers();

        foreach ($today as &$item) {
            $customer = !empty($item['customer_id'])
                ? $customerModel->selectFindOneBy('id', $item['customer_id'])
                : false;
            $item['customer_name'] = $customer[0]['name'] ?? '—';
        }
        unset($item);

        $customers = $customerModel->forUser($this->userId);
        $uniqueCustomers = count($customers);

        return $this->view('dashboard', [
            'role'            => $role,
            'today'           => $today,
            'data'            => $data,
            'service'         => $service,
            'uniqueCustomers' => $uniqueCustomers,
        ]);
    }
    public function logout()
    {
        Auth::logout();
        $this->redirectTo('login');
    }
}
