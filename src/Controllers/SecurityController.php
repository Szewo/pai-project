<?php

namespace App\Controllers;

use App\Attributes\Route;
use App\Exceptions\ViewNotFoundException;
use App\Repository\UserRepository;
use App\Routing\UserRole;

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
    #[Route('/', 'POST', UserRole::ANONYMOUS)]
    public function login() {

        if (!$this->isPost()) {
            $this->renderView('login');
        }

        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $user = $this->userRepository->getUserByEmail($email);

        if ($user === NULL || $user->getEmail() !== $email || $user->getPassword() !== $password) {
            return $this->renderView('login', ['message' => 'Something went wrong! Try Again!']);
        }

        $_SESSION['email'] = $user->getEmail();
        $_SESSION['id'] = $user->getId();
        $_SESSION['user_role'] = $user->getUserRole();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");
    }

}