<?php

namespace Controller;

class HomeController
{
    public function __invoke()
    {
        $title = 'Accueil';
        $username = '';
        if (isset($_SESSION['user'])) {
            $username = $_SESSION['user']->getUsername();
        }
        include(__DIR__ . '/../view/home.php');
        return $username;
    }
}