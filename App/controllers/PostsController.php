<?php 

namespace App\controllers;

use Framework\Database;
use Framework\Validation;

class PostsController extends HomeController {
    protected $db;
    private $uploadDir = 'public/img/uploads/featuredImage/';
    
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

    /**
     * Show individual category posts
     * 
     * @return void
     */
    public function categories($params) {
        $id = $params['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $category = $this->getCategory($params);

        // get all posts that belongs to this category 
        $params = [
            'category_id' => $id
        ];

        $posts = $this->db->query('SELECT * FROM posts WHERE category_id = :category_id', $params)->fetchAll();

        loadView('/posts/showCategory', [
            'category' => $category,
            'posts' => $posts,
            'categories' => $this->getCategory()
        ]);
        // inspectAndDie($posts);
        
    }

    /**
     * Load the create post page
     * 
     * @return void
     */
    public function create() {
        loadView('admin/create-post', [
            'categories' => $this->getCategory()
        ]);
    }

    /**
     * Creat post Store data in the database
     * 
     * @return void
     */
    public function store() {
        // make the query 
        $allowed_fields = ['title', 'category_id', 'tags', 'content', 'status'];

        $newPostsData = array_intersect_key($_POST, array_flip($allowed_fields));

        $newPostsData['author_id'] = 1;

        $newPostsData = array_map('sanitize', $newPostsData);


        // required fields
        $requiredFields = ['title', 'category_id', 'tags', 'content'];

        $errors = [];

        foreach($requiredFields as $field) {
            if(empty($newPostsData[$field]) && !Validation::string($newPostsData[$field])) {
                $errors[$field] = ucfirst($field) . " is required";
            }
        }

        if(!empty($errors)) {
            loadView('admin/create-post', [
                'errors' => $errors,
                'posts' => $newPostsData,
                'categories' => $this->getCategory()
            ]);
            exit;
        }

        inspectAndDie($newPostsData);


    }


}
