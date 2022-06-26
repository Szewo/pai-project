<?php

namespace App\Controllers;

use App\Attributes\Route;
use App\Exceptions\ViewNotFoundException;

class HomeController extends BaseController
{
    /**
     * @throws ViewNotFoundException
     */
    #[Route('/dashboard')]
    public function dashboard(): string
    {
        return $this->renderView('dashboard');
    }

}