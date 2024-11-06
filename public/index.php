<?php
require '../helpers.php';
require basePath('Router.php');
 
// current uri and HTTP Method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
$method = $_SERVER['REQUEST_METHOD'];
// inspectAndDie($uri);
// instantiate a Router object 
$router = new Router();

require basePath('routes.php');

// Request the route 
$router->route($uri, $method);

