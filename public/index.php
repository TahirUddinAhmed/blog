<?php
require '../helpers.php';

// loadView('home');

// router  
// current uri 
$uri = $_SERVER['REQUEST_URI'];

$routes = [
    '/' => 'controllers/home.php',
    '/login' => 'controllers/users/login.php',
    '/signup' => 'controllers/users/signup.php',
    '404' => 'controllers/errors/404.php'
];

// Request the route 
if(array_key_exists($uri, $routes)) {
    require basePath($routes[$uri]);

} else {
    // require the 404 error page
    http_response_code(404);
    require basePath($routes['404']);
}