<?php

namespace App\controllers;

use Framework\Database;

class ErrorController {
    protected $db;
    
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public static function notFound() {
        http_response_code(404);
        loadView('errors/404');
    }
}