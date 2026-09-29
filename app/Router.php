<?php

namespace App;

use Exceptions\BadRequestException;
use Exceptions\InternalServerErrorException;
use Exceptions\RouteNotFoundException;
use Middleware\Middleware;
use ReflectionClass;

class Router
{
    protected array $routes = [];
    protected array $routMiddlewares = [];
    protected Request $request;

    /**
     * Initializes the router with the current HTTP request.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Registers a GET route with an optional middleware.
     */
    public function get(string $url, $callback, $middleware = null)
    {
        $this->routes['get'][$url] = ['callback' => $callback, 'middleware' => $middleware];
    }

    /**
     * Registers a POST route with an optional middleware.
     */
    public function post(string $url, $callback, $middleware = null)
    {
        $this->routes['post'][$url] = ['callback' => $callback, 'middleware' => $middleware];
    }

    /**
     * Matches the current request to a registered route and executes its controller.
     */
    public function resolve()
    {
        $path = $this->request->url();
        $method = strtolower($this->request->method());
        $callback = null;
        $matches = [];
        $middleware = null;

        // Find a route matching the current HTTP method and request path.
        foreach ($this->routes[$method] ?? [] as $routePath => $routCallback) {
            $pattern = preg_replace('#\{[^}]+\}#', '([^/]+)', $routePath);
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $path, $routeMatches)) {
                $callback = $routCallback['callback'];
                $middleware = $routCallback['middleware'] ?? null;
                $matches = $routeMatches;
                break;
            }
        }

        if (!$callback) {
            throw new RouteNotFoundException("Not Found");
        }

        /**
         * Creates the controller instance, resolves its parameters,
         * and invokes the requested controller method.
         */
        $runController = function () use ($callback, $matches) {
            $class = $callback[0];
            $methodClass = $callback[1];

            $reflection = new ReflectionClass($class);
            $instance = $reflection->newInstance();

            $reflectionMethod = $reflection->getMethod($methodClass);
            $params = $reflectionMethod->getParameters();
            $args = [];

            $matchesIndex = 1;

            // Resolve controller parameters from the request and route parameters.
            foreach ($params as $param) {
                if (
                    $param->hasType() &&
                    !$param->getType()->isBuiltin() &&
                    $param->getType()->getName() === Request::class
                ) {
                    $args[] = $this->request;
                } elseif (isset($matches[$matchesIndex])) {
                    $args[] = $matches[$matchesIndex];
                    $matchesIndex++;
                } elseif ($param->isOptional()) {
                    $args[] = $param->getDefaultValue();
                } else {
                    throw new BadRequestException(
                        "Missing required parameter: " . $param->getName()
                    );
                }
            }

            $output = $reflectionMethod->invokeArgs($instance, $args);

            // Convert array responses into views and return string responses directly.
            if (is_array($output)) {
                $view = new View();
                return $view->make($output);
            } elseif (is_string($output)) {
                return $output;
            } else {
                throw new InternalServerErrorException("Invalid response type", 500);
            }
        };

        // Pass the request through the middleware before executing the controller.
        if ($middleware !== null) {
            $middleInstance = new $middleware();
            $next = $runController;
            return $middleInstance->handle($this->request, $next);
        } else {
            return $runController();
        }
    }
}
