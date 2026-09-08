<?php

namespace Controllers;

use App\Auth;
use App\Controller;
use App\Request;
use Models\Business;
use Models\BusinessOwnerships;
use Models\Service;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->layout = 'admin';
    }
    public function index(Request $request)
    {
        $service = new Service;
        $data = $service->select();
        return $this->view('service-dashboard', $data);
    }
    public function create(Request $request)
    {
        $auth = Auth::user();
        $userId = $auth['id'];
        $bo = new BusinessOwnerships();
        $bussiness = new Business();
        $data = null;
        $onwnshiper = $bo->selectFindOneBy('user_id', $userId);

        if (count($onwnshiper) >= 1) {
            foreach ($onwnshiper as $key) {
                $result = $bussiness->selectFindOneBy('id', $key['business_id']);
                if (!empty($result)) {
                    $data[] = $result[0];
                }
            }
        }
        return $this->view('create_service', $data);
    }
    public function store(Request $request)
    {
        $service = new Service();
        $data = $request->all();
        $result = [
        'business_id'       => $data['business_id'],
        'name'              => $data['name'],
        'duration_minutes'  => $data['duration_minutes'],
        'price'             => $data['price'] ?? 0,
        'max_capacity'      => $data['max_capacity'] ?? 1,
        'is_active'         => isset($data['is_active']) ? true : false,];
        $service->insert($result);
        $this->redirectTo('dashboard-service');
    }
}
