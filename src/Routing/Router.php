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
    public function registerRoutes(array $controllers): void
    {
        foreach ($controllers as $controller) {
            $reflectionController = new \ReflectionClass($controller);

            foreach ($reflectionController->getMethods() as $method) {
                $attributes = $method->getAttributes(Route::class);

                foreach ($attributes as $attribute) {
                    $route = $attribute->newInstance();

                    $this->addRoute($route->method, $route->path, [$controller, $method->getName(), $route->role]);
                }
            }
        }
    }

    public function resolveRoute(RequestInterface $request)
    {
        $route = explode('?', $request->getUrl())[0];
        $action = $this->routes[$request->getMethod()][$route] ?? null;

        if (!$action) {
            return 'Route not found';
        }

        [$class, $method, $role] = $action;

        if (!class_exists($class) || !method_exists($class, $method)) {
            return '404';
        }

        if ($this->isPageForbidden($role)) {
            return '403';
        }

        $controllerClass = new $class();

        return call_user_func_array([$controllerClass, $method], []);
    }

    private function isPageForbidden(UserRole $requiredRole): bool
    {
        $userIsLoggedIn = (!empty($_SESSION['user_role'])) && session_status() === PHP_SESSION_ACTIVE;
        if ($userIsLoggedIn) {
            return $_SESSION['user_role'] < $requiredRole;
        }

        return !($requiredRole === UserRole::ANONYMOUS);
    }

    private function addRoute(string $method, string $path, callable|array $action): void
    {
        $this->routes[$method][$path] = $action;
    }

}