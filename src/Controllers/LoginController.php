<?php

namespace App\Controllers;

use App\Attributes\Route;
use App\Exceptions\ViewNotFoundException;

class LoginController extends BaseController
{
    /**
     * @throws ViewNotFoundException
     */
    #[Route('/')]
    public function login(): string
    {
        return $this->renderView('login');
    }
}