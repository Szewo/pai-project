<?php

namespace App\Controllers;

use App\Attributes\Route;
use App\Models\User;

class SecurityController extends BaseController
{
    #[Route('/', 'POST')]
    public function login() {
        var_dump($_POST);
    }
}