<?php

use App\Application;
use App\Controllers\TestController;
use App\Routing\Request;
use App\Routing\Router;

require __DIR__ . '/../vendor/autoload.php';

$application = new Application(new Router());
$application->addControllersToRouter([
    TestController::class,
]);
echo $application->handleRouting(new Request());

phpinfo();