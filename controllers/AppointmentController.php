<?php 
namespace Controllers;

use App\Auth;
use App\Controller;
use App\Request;
use Models\Appointment;
use Models\Customers;
use Models\Service;

class AppointmentController extends Controller{
    public function __construct()
    {
        $this->layout='admin';
    }
    public function index(Request $request){
        // $auth=Auth::user();
        // $userId=$auth['id'];
        // $appointment=new Appointment();
        // $data=$appointment->forUser($userId);
        // return $this->view('appointment-dashboard',$data);
    $auth = Auth::user();
    $userId = $auth['id'];

    $appointment = new Appointment();
    $data = $appointment->forUser($userId);

    $customerModel = new Customers();
    $serviceModel  = new Service();

    foreach ($data as &$item) {
        $customer = !empty($item['customer_id'])
            ? $customerModel->selectFindOneBy('id', $item['customer_id'])
            : false;

        $service = !empty($item['service_id'])
            ? $serviceModel->selectFindOneBy('id', $item['service_id'])
            : false;

        $item['customer_name'] = $customer[0]['name'] ?? '—';
        $item['service_name']  = $service[0]['name']  ?? '—';
    }
    unset($item);

    return $this->view('appointment-dashboard', $data);
        }
}