<?php 

$router->get('/', 'HomeController@index');
$router->get('/about', 'InfoController@about');
$router->get('/contact', 'InfoController@contact');
$router->get('/posts', 'PostsController@index');
$router->get('/posts/{id}', 'PostsController@show');
$router->get('/category/{id}/posts', 'PostsController@categories');

// $router->get('/posts', 'PostController@show');
// $router->get('/login', 'controllers/users/login.php');
// $router->get('/signup', 'controllers/users/signup.php');
// $router->get('/admin', 'Controllers/admin/index.php');
// $router->get('/about', 'Controllers/about.php');
// $router->get('/contact', 'Controllers/contact.php');
// $router->get('/post', 'Controllers/posts/show.php');
