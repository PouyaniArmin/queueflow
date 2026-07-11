<?php

use App\Application;
use App\Request;
use App\Router;
use Config\Env;
use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\HomeController;
use Middleware\AuthMiddleware;
use Models\Database;

require_once __DIR__."/../vendor/autoload.php";
session_start();
$app=new Application(dirname(__DIR__),new Router(new Request));
Env::getInstance();
Env::load(dirname(__DIR__));
Database::getInstance();
Database::ensureDefaultTables();
$app->router->get('/',[HomeController::class,'index'],AuthMiddleware::class);
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
$app->run();