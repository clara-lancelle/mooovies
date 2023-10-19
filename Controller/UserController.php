<?php

namespace Controller;

use src\Queries\UserQueries;
use src\Validation\{LoginValidation, RegistrationValidation};
use Model\User;

class UserController
{
    public function login()
    {
        $formErrors = [];
        if (!isset($_SESSION['username'])) {
            if (count($_POST) > 0) {
                $loginValidation = new LoginValidation();
                $formErrors = $loginValidation->validate($_POST);
                if (count($formErrors) === 0) {
                    $user = new User();
                    $user->setUsername($_POST['username']);
                    $_SESSION['user'] = $user;
                    header("location: /home");
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
                var_dump($formErrors);
                die;
                if (count($formErrors) === 0) {
                    $user = new User();
                    $user->setUsername($_POST['username']);
                    $_SESSION['user'] = $user;
                    header("location: /home");
                }
            }
        }
        $title = 'Registration';
        include(__DIR__ . '/../user/register.php');
        return $formErrors;
    }

    public function logout()
    {
        if (isset($_SESSION['username']) && isset($_POST['logout'])) {
            session_destroy();
            unset($_SESSION['user']);
            $title = 'Home';
            header("location: /home");
        } else {
            $title = 'Home';
            header("location: /home");
        }

    }
}