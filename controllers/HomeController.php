<?php

namespace Controllers;

use App\Auth;
use App\Controller;
use App\Request;
use Models\Appointment;
use Models\Business;
use Models\Customers;
use Models\Service;
use Services\MailService;

class HomeController extends Controller
{
    private ?MailService $mail=null;
    public function __construct()
    {
        $this->mail=new MailService;
    }
    public function index(Request $request)
    {

        $business = new Business;
        $service = new Service;
        $service_data = $service->select();
        $business_data = $business->select();
        $data = ['business' => $business_data, 'service' => $service_data];
        return $this->view('home', $data);
    }
    public function schedule(Request $request)
    {

        $formData = $request->all();
        $customres = new Customers();
        $date_time = $formData['date'] . " " . $formData['time'];
        $customer_data = [
            'business_id' => $formData['business_id'],
            'user_id' => Auth::check() ? Auth::user()['id'] : null,
            'name' => $formData['customer_name'],
            'phone' => $formData['customer_phone'],
            'email' => $formData['customer_email'],
            'notes' => $formData['notes']
        ];
        $customresId = $customres->insert($customer_data);

        $appointment_data = [
            'business_id' => $formData['business_id'],
            'service_id' => $formData['service_id'],
            'customer_id' => $customresId,
            'date_time' => $date_time,
            'status' => 'pending',
            'access_token' => bin2hex(random_bytes(16)),
            'notes' => $formData['notes']
        ];
        $appointments = new Appointment;
        $appointments->insert($appointment_data);
        $this->mail->sendBookingEmail($formData['customer_email'],$formData['customer_name'], $date_time);
        return $this->redirectTo('');
    }
    public function test($id)
    {
        return $id;
    }
    public function new(Request $request, $id)
    {
        return "id: $id";
    }
    public function query(Request $request)
    {
        $data = $request->getQueryString('data');
        var_dump($data);
        return "Test";
    }
}
