<?php

namespace Controller;

class HomeController
{
    public function __invoke()
    {
        $title = 'Accueil';
        include(__DIR__ . '/../view/home.php');
        return;
    }
}