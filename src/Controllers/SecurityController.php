<?php

namespace App\Controllers;

use App\Attributes\Route;
use App\Exceptions\ViewNotFoundException;
use App\Repository\UserRepository;

class SecurityController extends BaseController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    /**
     * @throws ViewNotFoundException
     */
    #[Route('/', 'POST')]
    public function login() {

        if (!$this->isPost()) {
            $this->renderView('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userRepository->getUserByEmail($email);

        if ($user === NULL || $user->getEmail() !== $email || $user->getPassword() !== $password) {
            return $this->renderView('login', ['message' => 'Something went wrong! Try Again!']);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");

    }
}