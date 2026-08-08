<?php
namespace Controllers;

use App\Controller;
use App\Request;

class BusinessController extends Controller{
    public function index(Request $request){
          $this->layout='admin';
        return $this->view('business-dashboard');
    }
}