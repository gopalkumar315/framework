<?php

namespace App\Core;

Class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $routes = new self;
        require $file;
        return $routes;
    }

    public function get($uri,$controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri,$controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function direct($uri,$requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {

           return $this->callAction(
                ...explode('@',$this->routes[$requestType][$uri])
            );

        }
        
        throw new Exception('No route defined for this uri');
    }

    public function callAction($controller,$action)
    {
        $controller = "App\\Controllers\\{$controller}";

        if (!method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action"
            );
        }
        return (new $controller)->$action();
    }
}