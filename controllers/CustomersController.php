<?php 
namespace Controllers;

use App\Controller;
use App\Request;

class CustomersController extends Controller{
    public function index(Request $request){
        $this->layout='admin';
        return $this->view('customers-dashboard');
    }
}