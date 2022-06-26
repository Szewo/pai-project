<?php

namespace App;

use App\Routing\RequestInterface;
use App\Routing\Router;
use ReflectionException;

class Application
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @throws ReflectionException
     */
    public function addControllersToRouter(array $controllers): void
    {
        $this->router->registerRoutes($controllers);
    }

    /**
     */
    public function handleRouting(RequestInterface $request)
    {
        return $this->router->resolveRoute($request);
    }
}