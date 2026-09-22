<?php 
namespace Controllers;

use App\Auth;
use App\Controller;
use App\Request;
use Models\Customers;

class CustomersController extends Controller{
    private ?Int $userId=null;
    public function __construct()
    {
        $this->layout='admin';
        $auth=Auth::user();
        $this->userId=$auth['id'];
    }
    public function index(Request $request){
        $customer=new Customers;
        $data=$customer->forUser($this->userId);
        
        return $this->view('customers-dashboard',$data);
    }
}