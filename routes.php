<?php 

$router->get('/', 'controllers/home.php');
$router->get('/login', 'controllers/users/login.php');
$router->get('/signup', 'controllers/users/signup.php');
$router->get('/admin', 'Controllers/admin/index.php');