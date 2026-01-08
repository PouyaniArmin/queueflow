<?php
namespace Controllres;

use App\Controller;
use App\Request;
use App\View;

class HomeController extends Controller{
    public function index(Request $request){
        return $this->view('home');
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