<?php
namespace Controllers;

use App\Controller;

class DashboardController extends Controller
{
    public function index(){
        $this->layout='admin';
        return $this->view("dashboard");
    }
}