<?php 
namespace App\controllers;

use Framework\Database;

class HomeController {
    protected $db;

    public function __construct()
    {   
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    // index
    public function index() {
        $latest = $this->db->query('SELECT * FROM posts ORDER BY created_at DESC LIMIT 1')->fetch();

        $latest_id = $latest->id;
        $params = [
            'latestId' => $latest_id
        ];
        
        $posts = $this->db->query("SELECT * FROM posts WHERE id != :latestId ORDER BY created_at DESC LIMIT 8", $params)->fetchAll();
        
        loadView('home', [
            'latest' => $latest,
            'posts' => $posts
        ]);
    }
}