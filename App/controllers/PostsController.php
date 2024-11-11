<?php 

namespace App\controllers;

use Framework\Database;

class PostsController {
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function show($params) {
        $id = $params['id'] ?? '';

        
        $query = "SELECT * FROM posts WHERE id = :id";
        $params = [
            'id' => $id
        ];

        $post = $this->db->query($query, $params)->fetch();

        if(!$post) {
            ErrorController::notFound();
        }
        // Get the author details 
        $params = [ 
            'id' => $post->author_id
        ];

        $author = $this->db->query("SELECT * FROM users WHERE id = :id", $params)->fetch();


        loadView('posts/show', [
            'post' => $post,
            'author' => $author
        ]);
    }
}
