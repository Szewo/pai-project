<?php

session_start();

use App\Application;

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\SecurityController;
use App\Controllers\WorkoutController;
use App\Routing\Request;
use App\Routing\Router;

require __DIR__ . '/../vendor/autoload.php';

const VIEWS_DIR = __DIR__ . '/views/';

$application = new Application(new Router());
try {
    $application->addControllersToRouter([
        LoginController::class,
        SecurityController::class,
        HomeController::class,
        WorkoutController::class,
    ]);
} catch (ReflectionException $e) {
}
echo $application->handleRouting(new Request());
