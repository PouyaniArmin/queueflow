<?php

use App\Application;
use App\Request;
use App\Router;
use Config\Env;
use Controllers\AppointmentController;
use Controllers\AuthController;
use Controllers\BusinessController;
use Controllers\CustomersController;
use Controllers\DashboardController;
use Controllers\HomeController;
use Controllers\ServiceController;
use Controllers\SettingsController;
use Middleware\AdminMiddleware;
use Middleware\AuthMiddleware;
use Models\Database;

require_once __DIR__."/../vendor/autoload.php";
session_start();
$app=new Application(dirname(__DIR__),new Router(new Request));
Env::getInstance();
Env::load(dirname(__DIR__));
Database::getInstance();
Database::ensureDefaultTables();
$app->router->get('/',[HomeController::class,'index']);
$app->router->get('/post/{id}',[HomeController::class,'test']);
$app->router->get('/about/{id}',[HomeController::class,'new']);
$app->router->get('/appointments',[HomeController::class,'query']);
$app->router->get('/home',['test']);
$app->router->get('/test',function(){
    return "Test";
});
// auth
$app->router->get('/login',[AuthController::class,'index']);
$app->router->post('/login',[AuthController::class,'login']);
$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'registerUser']);

// dashboard

$app->router->get('/dashboard',[DashboardController::class,'index'],AuthMiddleware::class);
$app->router->get('/dashboard-business',[BusinessController::class,'index'],AuthMiddleware::class);
$app->router->get('/dashboard-business/create-business',[BusinessController::class,'create'],AuthMiddleware::class);
$app->router->post('/dashboard-business/create-business',[BusinessController::class,'store'],AuthMiddleware::class);
$app->router->get('/dashboard-service',[ServiceController::class,'index'],AuthMiddleware::class);
$app->router->get('/dashboard-appointment',[AppointmentController::class,'index'],AuthMiddleware::class);
$app->router->get('/dashboard-customers',[CustomersController::class,'index'],AuthMiddleware::class);
$app->router->get('/dashboard-settings',[SettingsController::class,'index'],AuthMiddleware::class);
$app->router->get('/logout',[DashboardController::class,'logout']);
$app->run();