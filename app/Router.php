<?php

namespace App;

use Exception;
use Exceptions\RouteNotFoundException;
use ReflectionClass;

use function PHPUnit\Framework\throwException;

class Router
{
    protected array $routes = [];
    protected Request $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function get(string $url, $callback)
    {
        $this->routes['get'][$url] = $callback;
    }

    public function post(string $url, $callback)
    {
        $this->routes['post'][$url] = $callback;
    }
    public function resolve()
    {
        $path = $this->request->url();
        $method = strtolower($this->request->method());

        foreach ($this->routes[$method] as $routePath => $callback) {
            $pattern = preg_replace('#\{[^}]+\}#', '([^/]+)', $routePath);
            $pattern = "#^" . $pattern . "$#";
            if (preg_match($pattern, $path, $matches)) {
                $class = $callback[0];
                $methodClass = $callback[1];
                $refelcation = new ReflectionClass($class);
                $instance = $refelcation->newInstance();
                $refelcationMethod = $refelcation->getMethod($methodClass);
                $params = $refelcationMethod->getParameters();
                $args = [];
                $matchesIndex = 1;
                foreach ($params as $param) {
                    if ($param->hasType() && !$param->getType()->isBuiltin() && $param->getType()->getName() === Request::class) {
                        $args[] = $this->request;
                    } elseif (isset($matches[$matchesIndex])) {
                        $args[] = $matches[$matchesIndex];
                    } elseif ($param->isOptional()) {
                        $args[] = $param->getDefaultValue();
                    } else {
                        throw new Exception("Missing Parameter");
                    }
                }
                $output = $refelcationMethod->invokeArgs($instance, $args);
                if (is_array($output)) {
                    $view = new View;
                    return $view->make($output);
                } elseif (is_string($output)) {
                    return $output;
                } else {
                    return "Not Found";
                }
            } else {
                throw new RouteNotFoundException();
            }
        }
    }
}
