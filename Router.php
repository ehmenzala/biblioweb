<?php

class Router {

    private $routes = [];

    public function get($uri, $controller): void {
        $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller): void {
        $this->add($uri, $controller, 'POST');
    }

    public function put($uri, $controller): void {
        $this->add($uri, $controller, 'PUT');
    }

    public function delete($uri, $controller): void {
        $this->add($uri, $controller, 'DELETE');
    }

    public function route($uri, $method) {

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require $route['controller'];
            }
        }

        $this->abort();
    }

    private function add($uri, $controller, $method): void {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
        ];
    }

    private function abort($code = 404): void {
        http_response_code($code);
        require "src/views/{$code}.html";
    }
}
