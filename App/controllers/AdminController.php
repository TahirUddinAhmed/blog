<?php 

namespace App\controllers;

use Framework\Database;
use Framework\Validation;

class AdminController {
    private $db;
    
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Show Categories 
     * 
     * @return void
     */
    public function showCategory() {
        loadView('/admin/categories/index');
    }

    /**
     * Create Category 
     * 
     * @return void
     */
    public function createCategory() {
        $categoryName = sanitize($_POST['category_name']);

        $errors = "";

        if(empty($categoryName) || !Validation::string($categoryName, 1)) {
            $errors = "Please enter the category name";
        }

        if(!empty($errors)) {
            loadView('admin/categories/index', [
                'errors' => $errors
            ]);
            exit;
        } else {
            // insert the data into database 
            $query = "INSERT INTO category (name) VALUES (:name)";

            $params = [
                'name' => $categoryName
            ];

            $this->db->query($query, $params);

            redirect('/admin/categories');
        }


    }
}