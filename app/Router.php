<?php

namespace App;

use Exception;
use Exceptions\BadRequestException;
use Exceptions\InternalServerErrorException;
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
        $callback = null;
        $matches = [];
        foreach ($this->routes[$method] as $routePath => $routCallback) {
            $pattern = preg_replace('#\{[^}]+\}#', '([^/]+)', $routePath);
            $pattern = "#^" . $pattern . "$#";
            if (preg_match($pattern, $path, $routeMatches)) {
                $callback = $routCallback;
                $matches = $routeMatches;
                break;
            }
        }
        if (!$callback) {
            throw new RouteNotFoundException("Not Found");
        }

        $class = $callback[0];
        $methodClass = $callback[1];
        $reflection = new ReflectionClass($class);
        $instance = $reflection->newInstance();
        $reflectionMethod = $reflection->getMethod($methodClass);
        $params = $reflectionMethod->getParameters();
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
                throw new BadRequestException("Missing required parameter".$param->getName());
            }
        }
        $output = $reflectionMethod->invokeArgs($instance, $args);
        if (is_array($output)) {
            $view = new View;
            return $view->make($output);
        } elseif (is_string($output)) {
            return $output;
        } else {
            throw new InternalServerErrorException("Invalid response type", 500);
        }
    }
}
