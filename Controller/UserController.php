<?php

namespace Controller;

use src\Queries\UserQueries;
use src\Validation\{LoginValidation, RegistrationValidation};
use Model\User;

class UserController
{
    public function __invoke()
    {
        $this->login();
    }
    public function login()
    {
        $formErrors = [];
        if (!isset($_SESSION['username'])) {
            if (count($_POST) > 0) {
                $loginValidation = new LoginValidation();
                $formErrors = $loginValidation->validate($_POST);
                if (count($formErrors) === 0) {
                    $user = (new User())->setUsername($_POST['username']);
                    $_SESSION['user'] = $user->getUsername();
                    $_SESSION['id'] = UserQueries::getUserId($_SESSION['user']);
                    header("location: /movie/dashboard");
                }
            }
        }
        $title = 'Connexion';
        include(__DIR__ . '/../view/login.php');
        return $formErrors;
    }

    public function register()
    {
        $formErrors = [];
        if (!isset($_SESSION['username'])) {
            if (count($_POST) > 0) {
                $registrationValidation = new RegistrationValidation();
                $formErrors = $registrationValidation->validate($_POST);
                if (count($formErrors) === 0) {
                    $validData = $registrationValidation->getFormValidData();
                    $user = new User();
                    $user->setUsername($validData['username'])->setPassword($validData['password']);
                    UserQueries::registerUser($user);
                    $_SESSION['user'] = $user->getUsername();
                    $_SESSION['id'] = UserQueries::getUserId($_SESSION['user']);
                    header("location: /movie/dashboard");
                }
            }
        }
        $title = 'Registration';
        include(__DIR__ . '/../view/register.php');
        return $formErrors;
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            session_destroy();
            unset($_SESSION['user']);
        }
        $title = 'Home';
        header("location: /home");
    }
}