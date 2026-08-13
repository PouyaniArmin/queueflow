<?php 
namespace Controllers;

use App\Controller;
use App\Request;

class SettingsController extends Controller{
    public function index(Request $request){
        $this->layout='admin';
        return $this->view('settings-dashboard');
    }
}