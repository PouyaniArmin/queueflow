<?php
namespace Controllers;

use App\Auth;
use App\Controller;
use App\Request;
use Models\Appointment;
use Models\Business;
use Models\Service;

class HomeController extends Controller{
    public function index(Request $request){
        $business=new Business;
        $service=new Service;
        $service_data=$service->select();
        $business_data=$business->select();
        $data=['business'=>$business_data,'service'=>$service_data];
        return $this->view('home',$data);
    }
    public function schedule(Request $request){
        $formData=$request->all();
        $date_time=$formData['date']." ".$formData['time'];
                $data=['business_id'=>$formData['business_id'],'service_id'=>$formData['service_id'],
        'customer_user_id'=>Auth::check() ? Auth::user()['id'] : null,'customer_name'=>$formData['customer_name'],
        'customer_phone'=>$formData['customer_phone'],'customer_email'=>$formData['customer_email'],
        'date_time'=>$date_time,'status'=> 'pending','notes'=>$formData['notes']];
        $appointments=new Appointment;
        $appointments->insert($data);
        return $this->redirectTo('');
    }
    public function test($id){
        return $id;
    }
    public function new(Request $request,$id){
        return "id: $id";
    }
    public function query(Request $request){
        $data=$request->getQueryString('data');
        var_dump($data);
        return "Test";
    }
}