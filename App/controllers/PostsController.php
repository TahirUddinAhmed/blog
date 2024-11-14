<?php 

namespace App\controllers;

use Framework\Database;

class PostsController extends HomeController {
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * View all posts
     * 
     * @return void
     */
    public function index() {
        $query = "SELECT * FROM posts ORDER BY created_at DESC";

        $posts = $this->db->query($query)->fetchAll();

        loadView('posts/index', [
            'posts' => $posts,
            'categories' => $this->getCategory()
        ]);
    }

    /**
     * View signle posts
     *
     * @param [type] $params
     * @return void
     */
    public function show($params) {
        $id = $params['id'] ?? '';

        
        $query = "SELECT * FROM posts WHERE id = :id";
        $params = [
            'id' => $id
        ];

        $post = $this->db->query($query, $params)->fetch();

        if(!$post) {
            ErrorController::notFound('The post your looking for is not found');
            exit;
        }
        // Get the author details 
        $params = [ 
            'id' => $post->author_id
        ];

        $author = $this->db->query("SELECT * FROM users WHERE id = :id", $params)->fetch();


        loadView('posts/show', [
            'post' => $post,
            'author' => $author,
            'categories' => $this->getCategory()
        ]);
    }
}
