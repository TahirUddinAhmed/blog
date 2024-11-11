<?php
require __DIR__ . '/../vendor/autoload.php';
require '../helpers.php';
 
// $method = $_SERVER['REQUEST_METHOD'];
$router = new Framework\Router();


// Get current uri 
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 

require basePath('routes.php');

// inspectAndDie($router);
// Request the route 
$router->route($uri);

