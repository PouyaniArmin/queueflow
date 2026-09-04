<?php

namespace Controllers;

use App\Auth;
use App\Controller;
use App\Request;
use Models\Business;
use Models\BusinessOwnerships;
use Models\User;

class BusinessController extends Controller
{
    public function __construct()
    {
        $this->layout = 'admin';
    }
    public function index(Request $request)
    {
        return $this->view('business-dashboard');
    }
    public function create(Request $request)
    {
        return $this->view('create-business');
    }
    public function store(Request $request)
    {
        $data=$request->all();
        $slug=$this->createSlug($data['name']);
        $user=new User();
        $auth=Auth::user();
        $business=new Business();
        $businessOwnerships=new BusinessOwnerships();
        $result=['name'=>$data['name'],
        'slug'=>$slug,'address'=>$data['address'],'phone'=>$data['phone'] ,
        'descriptio'=>$data['description'],'timezone'=>$data['timezone'],'is_active'=>$data['is_active']
        ];
        $business=new Business();
        $businessOwnerships=new BusinessOwnerships();
        $businessId=$business->insert($result);
        $businessOwnerships->insert(['user_id'=>$auth['id'],'business_id'=>$businessId]);
        $resultUpdate=$user->update(['role_id'=>2],$auth['id']);
        Auth::syncUser();
        $this->redirectTo('dashboard');
    }

    private function createSlug(string $string):string{
        $slug=strtolower($string);
        $slug=preg_replace('/[^a-z0-9\s]/','',$slug);
        $slug=str_replace(' ','-',$slug);
        return trim($slug,'-');
    }
}
