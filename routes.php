<?php 
// return [
//     '/' => 'controllers/home.php',
//     '/login' => 'controllers/users/login.php',
//     '/signup' => 'controllers/users/signup.php',
//     '404' => 'controllers/errors/404.php'
// ];

$router->get('/', 'controllers/home.php');
$router->get('/login', 'controllers/users/login.php');
$router->get('/signup', 'controllers/users/signup.php');