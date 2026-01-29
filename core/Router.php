<?php

namespace Core;

class Router
{
    protected $routes = [];


    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function resolve($uri, $method)
    {
        if (isset($this->routes[$method][$uri])) {
            $request = new Request();
            $response = new Response();
            return $this->callAction(
                $uri,
                $method,
                $request,
                $response
            );
        }
        die("404- آدرس پیدا نشد");
    }

    public function callAction($uri, $method, $request, $response)
    {
        [$controller, $action] = explode('@', $this->routes[$method][$uri]);
        $controller = "App\\Controllers\\{$controller}";
        $controllerInstance = new $controller;
        return $controllerInstance->$action($request, $response);
    }
}
