<?php

namespace App\Controllers;

use App\Attributes\Route;
use App\Exceptions\ViewNotFoundException;
use App\Routing\UserRole;

class HomeController extends BaseController
{
    /**
     * @throws ViewNotFoundException
     */
    #[Route('/dashboard', 'GET', UserRole::REGISTERED)]
    public function dashboard(): string
    {
        return $this->renderView('dashboard');
    }

}