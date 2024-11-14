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
            'posts' => $posts,
            'categories' => $this->getCategory()
        ]);
    }

    /**
     * Get all the categories (if the params has one element)
     * 
     * @return string $data
     */
    protected function getCategory($params = []) {

        if(empty($params)) {
            $query = "SELECT * FROM category ORDER BY created_at DESC";
            $data = $this->db->query($query)->fetchAll();

            return $data;
        } else {
            // prepare the query 
            $allowedFields = ['id', 'name'];

            $newData = array_intersect_key($params, array_flip($allowedFields));

            // check if the array has one element 
            if(count($newData) === 1) {
                $field = implode('=>', array_flip($newData));
                // $values = implode('=>', array_flip($newData));
                $value = ':' . implode('=>', array_flip($newData));
                $query = "SELECT * FROM category WHERE {$field} = {$value}";

                $data = $this->db->query($query, $params)->fetch();

                if(!$data) {
                    ErrorController::notFound('Category not found');
                    exit;
                }
                return $data;
            }
            // $fields = [];
            // foreach($newData as $data) {

            // }
            
        }
        
    }
}