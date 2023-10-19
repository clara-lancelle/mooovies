<?php

require 'autoloader.php';

$controller = 'home';
$action = '';
if (count($_GET) > 0) {
    $params = $_GET['params'];

    $arguments = explode('/', $params);

    $controller = $arguments[0] ?: 'home';
    $action = $arguments[1] ?: ' ';
}

$controllerNamespace = 'Controller\\' . ucfirst($controller) . 'Controller';

if (class_exists($controllerNamespace)) {
    $instance = new $controllerNamespace();

    if (null !== $action && method_exists($instance, $action)) {
        $instance->$action();
    } else {
        // call by defaut index action
        $instance();
    }
}