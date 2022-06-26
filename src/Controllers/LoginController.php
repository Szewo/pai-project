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
        $this->resetSession();
        return $this->renderView('login');
    }

    /**
     * @throws ViewNotFoundException
     */
    #[Route('/register')]
    public function register(): string
    {
        $this->resetSession();
        return $this->renderView('register');
    }

    private function resetSession(): void
    {
        session_destroy();
        session_start();
    }
}