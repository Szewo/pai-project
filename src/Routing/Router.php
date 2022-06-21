<?php

declare(strict_types=1);

namespace App\Routing;

use App\Attributes\Route;
use ReflectionException;

class Router
{
    private array $routes = [];

    /**
     * @throws ReflectionException
     */
    public function reqisterRoutes(array $controllers): void
    {
        foreach ($controllers as $controller) {
            $reflectionController = new \ReflectionClass($controller);

            foreach ($reflectionController->getMethods() as $method) {
                $attributes = $method->getAttributes(Route::class);

                foreach ($attributes as $attribute) {
                    $route = $attribute->newInstance();

                    $this->addRoute($route->method, $route->path, [$controller, $method->getName()]);
                }
            }
        }
    }

    public function resolveRoute(RequestInterface $request)
    {
        $route = explode('?', $request->getUrl())[0];
        $action = $this->routes[$request->getMethod()][$route] ?? null;

        if (! $action) {
            return 'Route not found';
        }

        [$class, $method] = $action;

        if (class_exists($class)) {
            $controllerClass = new $class();

            if (method_exists($class, $method)) {
                return call_user_func_array([$controllerClass, $method], []);
            }
        }

        return '404';
    }

    private function addRoute(string $method, string $path, callable|array $action): void
    {
        $this->routes[$method][$path] = $action;
    }

}