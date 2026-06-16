<?php

namespace App;

use Dotenv\Util\Str;
use Exception;
use Exceptions\RouteNotFoundException;

class Application
{
  public Router $router;
  public ?Application $app=null;
  public static ?string $rootPath=null;
  public function __construct(string $rootPath,Router $router)
  {
    $this->app=$this;
    self::$rootPath=$rootPath;
    $this->router = $router;
  }
  public function run()
  {
    try {
      echo $this->router->resolve();
    } catch (RouteNotFoundException $e) {
      http_response_code(404);
      $view = new View;
      echo $view->make(['view' => '404', 'data' => ['title' => 'page not Found'], 'layout' => 'main']);
    } catch (Exception $e) {
      http_response_code(500);
      echo "Error Server 500 " . $e->getMessage();
    }
  }
}
