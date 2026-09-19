<?php 
namespace Controllers;

use App\Auth;
use App\Controller;
use App\Request;
use Models\Appointment;

class AppointmentController extends Controller{
    public function __construct()
    {
        $this->layout='admin';
    }
    public function index(Request $request){
        $auth=Auth::user();
        $userId=$auth['id'];
        $appointment=new Appointment();
        $data=$appointment->forUser($userId);
        return $this->view('appointment-dashboard',$data);
    }
}