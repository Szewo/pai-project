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

    private function resetSession(): void
    {
        session_destroy();
        session_start();
    }
}