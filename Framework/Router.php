<?php

namespace Framework;

use App\controllers\ErrorController;

class Router {
    protected $routes = [];

    /**
     * Register a route 
     * 
     * @param string $method
     * @param string $uri
     * @param string $action
     * @return void
     */
    protected function registerRoute($method, $uri, $action) {
        list($controller, $controllerMethod) = explode('@', $action);
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod
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
        // inspectAndDie($uri);
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
    public function route($uri) {
        // get the current HTTP method 
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // check of _method
        if($requestMethod === 'POST' && isset($_POST['_method'])) {
            // override the request method
            $requestMethod = strtoupper($_POST['_method']);
        }
       
        foreach($this->routes as $route) {
            // slip the uri into segments
            $uriSegments = explode('/', $uri);
            // Slip the route uri into segments 
            $routeSegments = explode('/', $route['uri']);
            // inspectAndDie($routeSegments);

            $match = true;

            // check if the number of segments matches
            if(count($uriSegments) === count($routeSegments) && strtoupper($route['method']) === $requestMethod) {
                $params = [];
                $match = true;
                
                for($i = 0;  $i < count($uriSegments); $i++) {
                    // If the uri's do not match and there is no params 
                    // if there are no params inside {} curly braces, means {id}, {slug}
                    if($routeSegments[$i] != $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
                        $match = false;
                        break;
                    }
                    
                    //  check for the param add add to $params array
                    if(preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                        $params[$matches[1]] = $uriSegments[$i];
                    }
                }
                // inspectAndDie($match);
                if($match) {
                    // extract controller and controller method 
                    $controller = 'App\\controllers\\'.$route['controller'];
                    $controllerMethod = $route['controllerMethod'];
                    // inspectAndDie($controller);
                    // instantiate the controller
                    $controllerInstance = new $controller();
                    $controllerInstance->$controllerMethod($params);
                    return; // if found return the function
                }

            }
            
        }
        ErrorController::notFound();
    }
}