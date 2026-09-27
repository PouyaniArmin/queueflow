<?php

namespace Controllers;

use App\Auth;
use App\Controller;
use App\Request;
use Models\Appointment;
use Models\Customers;
use Models\Service;
use Services\MailService;

class AppointmentController extends Controller
{
    private ?Appointment $appointment = null;
    public function __construct()
    {
        $this->appointment = new Appointment;
        $this->layout = 'admin';
    }
    public function index(Request $request)
    {
        $auth = Auth::user();
        $userId = $auth['id'];

        $data = $this->appointment->forUser($userId);

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

    public function confirmedAppointment(int $id)
    {
        $this->appointment->update(['status' => 'confirmed'], $id);
        $this->redirectTo('dashboard-appointment');
    }
    public function cancelledAppointment(int $id)
    {
        $data=$this->appointment->selectFindOneBy('id',$id);
        $this->appointment->update(['status' => 'cancelled'], $id);
        $customer=new Customers;
        $reslut=$customer->selectFindOneBy('id',$data[0]['customer_id']);
        $mail=new MailService;
        $mail->sendCancelEmail($reslut[0]['email'],$reslut[0]['name'],$data[0]['date_time']);
        $this->redirectTo('dashboard-appointment');
    }
    public function completedAppointment(int $id)
    {
        $this->appointment->update(['status' => 'completed'], $id);
        $this->redirectTo('dashboard-appointment');
    }
}
