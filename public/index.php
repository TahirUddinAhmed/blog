<?php
require '../helpers.php';
require basePath('Database.php');
require basePath('Router.php');

$config = require basePath('config/db.php');

// instantiate a Database object 
$database = new Database($config);
 
// current uri and HTTP Method
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// instantiate a Router object 
$router = new Router();

require basePath('routes.php');

// Request the route 
$router->route($uri, $method);

