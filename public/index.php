<?php

use App\Application;

use App\Controllers\LoginController;
use App\Routing\Request;
use App\Routing\Router;

require __DIR__ . '/../vendor/autoload.php';

const VIEWS_DIR = __DIR__ . '/../src/Views/';

$application = new Application(new Router());
$application->addControllersToRouter([
    LoginController::class,
]);
echo $application->handleRouting(new Request());
