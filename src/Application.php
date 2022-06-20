<?php

namespace App;

use App\Routing\RequestInterface;
use App\Routing\Router;

class Application
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @throws \ReflectionException
     */
    public function addControllersToRouter(array $controllers)
    {
        $this->router->reqisterRoutes($controllers);
    }

    /**
     */
    public function handleRouting(RequestInterface $request)
    {
        return $this->router->resolveRoute($request);
    }
}