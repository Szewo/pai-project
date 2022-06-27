<?php

namespace App\Controllers;

use App\Attributes\Route;
use App\Exceptions\ViewNotFoundException;
use App\Models\User;
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
        $user = $this->userRepository->getUserByEmail($email);

        if ($user === NULL || $user->getEmail() !== $email || !password_verify($_POST['password'], $user->getPassword())) {
            return $this->renderView('login', ['message' => 'Something went wrong! Try Again!']);
        }

        $_SESSION['email'] = $user->getEmail();
        $_SESSION['id'] = $user->getId();
        $_SESSION['user_role'] = $user->getUserRole();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");
    }

    /**
     * @throws ViewNotFoundException
     */
    #[Route('/register', 'POST', UserRole::ANONYMOUS)]
    public function register() {
        if (!$this->isPost()) {
            $this->renderView('register');
        }

        $email = trim($_POST['email']);
        $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
        $repeatPassword = trim($_POST['rep_password']);
        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);

        $user = new User($email, $password, $name, $surname);

        $this->userRepository->addUserDetails($user);
        $this->userRepository->addUserDetailsLastInsertedId($user);
        $this->userRepository->addUser($user);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }

    #[Route('/logout', 'GET', UserRole::REGISTERED)]
    public function logout() {
        unset($_SESSION['email'], $_SESSION['id'], $_SESSION['user_role']);
        session_destroy();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }
}