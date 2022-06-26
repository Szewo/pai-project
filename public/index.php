<?php

use App\Application;

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\SecurityController;
use App\Routing\Request;
use App\Routing\Router;

require __DIR__ . '/../vendor/autoload.php';

const VIEWS_DIR = __DIR__ . '/../src/Views/';

$application = new Application(new Router());
try {
    $application->addControllersToRouter([
        LoginController::class,
        SecurityController::class,
        HomeController::class,
    ]);
} catch (ReflectionException $e) {
}
echo $application->handleRouting(new Request());
