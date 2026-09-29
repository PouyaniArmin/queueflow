<?php

namespace App;

use Dotenv\Util\Str;
use Exception;
use Exceptions\RouteNotFoundException;

class Application
{
  /**
   * The application's router instance.
   */
  public Router $router;

  /**
   * Holds the current application instance.
   */
  public ?Application $app = null;

  /**
   * Stores the application's root path.
   */
  public static ?string $rootPath = null;

  /**
   * Initializes the application with its root path and router.
   */
  public function __construct(string $rootPath, Router $router)
  {
    $this->app = $this;
    self::$rootPath = $rootPath;
    $this->router = $router;
  }

  /**
   * Resolves the current route and handles application-level exceptions.
   */
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
