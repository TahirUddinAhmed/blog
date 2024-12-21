<?php 

$router->get('/', 'HomeController@index');
$router->get('/about', 'InfoController@about');
$router->get('/contact', 'InfoController@contact');
$router->get('/posts', 'PostsController@index');
$router->get('/posts/{id}', 'PostsController@show');
$router->get('/category/{id}/posts', 'PostsController@categories');
$router->get('/admin', 'UserController@admin');
$router->get('/admin/posts/create', 'PostsController@create');
$router->get('/admin/posts/viewall', 'PostsController@viewAll');

// post
$router->post('/admin/posts', 'PostsController@store');
$router->get('/admin/posts/{id}/edit', 'PostsController@edit');

// edit 
$router->put('/admin/posts/{id}/edit', 'PostsController@update');