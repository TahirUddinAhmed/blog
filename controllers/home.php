<?php
// Steps 
// 1. Require the database config and connect to the database
// 2. Query the query to retrieve all post from the database posts table 
require basePath('Database.php');
$config = require basePath('config/db.php');
$db = new Database($config);

$posts = $db->query("SELECT * FROM posts")->fetchAll();

loadView('home', [
    'posts' => $posts
]);