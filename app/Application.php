<?php
namespace App;
class Application{
    public Router $router;
    public function __construct(Router $router)
    {
        $this->router=$router;
    }
    public function run(){
      echo $this->router->resolve();
    }
}