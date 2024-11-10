<?php

namespace Framework;

class Router {
    protected $routes = [];

    /**
     * Register a route 
     * 
     * @param string $method
     * @param string $uri
     * @param string $controller
     * @return void
     */
    protected function registerRoute($method, $uri, $controller) {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    /**
     * GET method 
     * 
     * @param string $uri
     * @param string $controller
     * @return void
     */
    public function get($uri, $controller) {
        $this->registerRoute('GET', $uri, $controller);
    }

    /**
     * POST method 
     * 
     * @param string $uri
     * @param string $controller 
     * @return void
     */
    public function post($uri, $controller) {
        $this->registerRoute('POST', $uri, $controller);
    }

    /**
     * PUT method
     * 
     * @param string $uri
     * @param string $controller
     * @param void
     */
    public function put($uri, $controller) {
        $this->registerRoute('PUT', $uri, $controller);
    }

    /**
     * DELETE Method 
     * 
     * @param string $uri
     * @param string $controller
     * @return void
     */
    public function delete($uri, $controller) {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    /**
     * Request a route 
     * 
     * @param string $uri [Current uri]
     * @param string $method [Current HTTP method]
     * @return void
     */
    public function route($uri, $method) {
        // login 
        foreach($this->routes as $route) {
            // if it match the current $uri, and $method
            if($route['uri'] === $uri && $route['method'] === $method) {
                require basePath('App/' .$route['controller']);
                return; 
            }
        }

        http_response_code(404);
        require basePath('controllers/errors/404.php');
    }
}