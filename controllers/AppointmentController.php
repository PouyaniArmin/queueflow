<?php 
namespace Controllers;

use App\Controller;
use App\Request;

class AppointmentController extends Controller{
    public function index(Request $request){
        $this->layout='admin';
        return $this->view('appointment-dashboard');
    }
}