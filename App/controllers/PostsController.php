<?php 

namespace App\controllers;

use Framework\Database;
use Framework\Validation;

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
        loadView('admin/posts/create-post', [
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

        // Define allowed status values
        $allowedStatusValues = ['draft', 'published', 'private'];
    
        // required fields
        $requiredFields = ['title', 'category_id', 'tags', 'content'];

        $errors = [];

        foreach($requiredFields as $field) {
            if(empty($newPostsData[$field]) && !Validation::string($newPostsData[$field])) {
                $errors[$field] = ucfirst($field) . " is required";
            }
        }
        
        // Validate 'status' field
        if (!in_array($newPostsData['status'], $allowedStatusValues)) {
            $errors['status'] = "Invalid status value. Allowed values are: " . implode(', ', $allowedStatusValues);
        }

         // Validate file upload
        if ($_FILES['post_image']['error'] === UPLOAD_ERR_NO_FILE) {
            $errors['post_image'] = "Post Featured Image is required";
        } else {
            $allowed_ext = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];

            $file_size = $_FILES['post_image']['size'];
            $file_temp = $_FILES['post_image']['tmp_name'];
            $file_type = $_FILES['post_image']['type'];

            if (!in_array($file_type, $allowed_ext)) {
                $errors['post_image'] = 'Only png, jpg, jpeg, and webp are allowed';
            } else {
                $check = getimagesize($file_temp);

                $maxFileSize = .5 * 1024 * 1024; // 500KB

                if($file_size > $maxFileSize) {
                    $errors['post_image'] = 'Featured image is too large, it must be less than 500KB';
                }

            }
        }

        // Check for errors
        if(!empty($errors)) {
            loadView('admin/posts/create-post', [
                'errors' => $errors,
                'posts' => $newPostsData,
                'categories' => $this->getCategory()
            ]);
            exit;
        } 

        // Handle image upload
        $fileExt = pathinfo($_FILES['post_image']['name'], PATHINFO_EXTENSION);

        $newPostsData['post_image'] = 'postImg_' . uniqid() . '.' . $fileExt;

        $targetDir = basePath('public/upload/featuredImage/');

        if(!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        
        $targetPath = $targetDir . $newPostsData['post_image'];


        if(move_uploaded_file($_FILES['post_image']['tmp_name'], $targetPath)) {
            $fields = [];

            foreach($newPostsData as $data => $value) {
                $fields[] = $data;
            }

            $fields = implode(', ', $fields);

            $values = [];

            foreach($newPostsData as $data => $value) {
                if($value === '') {
                    $newPostsData[$data] = null;
                }

                $values[] = ':' . $data;
            }

            $values = implode(',', $values);

            $query = "INSERT INTO posts ({$fields}) VALUES ({$values})";

            $this->db->query($query, $newPostsData);

            

            redirect('/posts');
        }


    }

    /**
     * View All Posts 
     * 
     * @return void
     */
    public function viewAll() {
       $query = "SELECT * FROM posts ORDER BY created_at DESC";
       $postAll = $this->db->query($query)->fetchAll();
       
       if(!$postAll) {
        ErrorController::notFound("Something goes worng");
        exit;
       }
       foreach($postAll as $post) {
        $category_id = $post->category_id;
        $query = "SELECT name FROM category WHERE id = :id";

        $params = [
            'id' => $category_id
        ];

        $category_name = $this->db->query($query, $params)->fetch();

        $post->category_name = $category_name->name;
       }



    //    inspect($postAll);
       loadView('/admin/posts/viewall', [
        'posts' => $postAll,
       ]);
    }

    /**
     * Edit Post
     * 
     * @return void
     */
    public function edit($params) {
        $id = $params['id'] ?? null;

        $query = "SELECT * FROM posts WHERE id = :id";

        $param = [
            'id' => $id
        ];

        $post = $this->db->query($query, $param)->fetch();


        if(!$post) {
            ErrorController::notFound('Sorry, no post is found');
            exit;
        }
        // fetch the category name
        $category_id = $post->category_id;
        $param = [
            'id' => $category_id
        ];

        $category_name = $this->db->query("SELECT name FROM category WHERE id = :id", $param)->fetch();

        $post->category_name = $category_name->name;

        loadView('admin/posts/edit-post', [
            'post' => $post,
            'categories' => $this->getCategory()
        ]);
    }


}
