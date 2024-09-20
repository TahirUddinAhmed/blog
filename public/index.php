<?php
require '../helpers.php';
$routes = require basePath('routes.php');
// loadView('home');

// router  
// current uri 
$uri = $_SERVER['REQUEST_URI'];

require basePath('router.php');

// Request the route 

