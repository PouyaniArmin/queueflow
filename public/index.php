<?php

use App\Application;
use App\Request;
use App\Router;
use Controllres\HomeController;
use Controllres\HomeCotnteoller;

require_once __DIR__."/../vendor/autoload.php";

$app=new Application(new Router(new Request));
$app->router->get('/',[HomeController::class,'index']);
$app->router->get('/post/{id}',[HomeController::class,'test']);
$app->router->get('/about/{id}',[HomeController::class,'new']);
$app->router->get('/home',['test']);
$app->router->get('/test',function(){
    return "Test";
});
$app->run();