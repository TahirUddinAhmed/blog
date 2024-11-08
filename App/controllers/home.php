<?php
// Steps 
// 1. Require the database config and connect to the database
// 2. Query the query to retrieve all post from the database posts table 
require basePath('Framework/Database.php');
$config = require basePath('config/db.php');
$db = new Database($config);

// $posts = $db->query("SELECT * FROM posts")->fetchAll();

// find the latest post 
$latest = $db->query('SELECT * FROM posts ORDER BY created_at DESC LIMIT 1')->fetch();

$latest_id = $latest->id;
$params = [
    'latestId' => $latest_id
];

$posts = $db->query("SELECT * FROM posts WHERE id != :latestId ORDER BY created_at DESC", $params)->fetchAll();

loadView('home', [
    'latest' => $latest,
    'posts' => $posts
]);