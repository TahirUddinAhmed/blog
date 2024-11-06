<?php 
require basePath('Database.php');

$config = require basePath('config/db.php');

$db = new Database($config);

// get the post id from url 
// $id = $GET['id'] ?? '';

if(isset($_GET['id'])) {
   $id = $_GET['id'];
   $params = [
       'id' => $id
   ];
   $post = $db->query("SELECT * FROM posts WHERE id=:id", $params)->fetch();
   
   $author_id = $post->author_id;

   $params = [
    'id' => $author_id
   ];
   $author = $db->query('SELECT * FROM users WHERE id=:id', $params)->fetch();


   loadView('/posts/show', [
    'post' => $post,
    'author' => $author
   ]);
}


