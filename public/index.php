<?php
require __DIR__ . '/../vendor/autoload.php';
require '../helpers.php';
// require basePath('Framework/Router.php');

// use Framework\Router;
 
// current uri and HTTP Method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
$method = $_SERVER['REQUEST_METHOD'];

$router = new Framework\Router();

require basePath('routes.php');

// Request the route 
$router->route($uri, $method);

