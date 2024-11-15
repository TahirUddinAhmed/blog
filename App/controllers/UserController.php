<?php

namespace App\controllers;

use Framework\Database;

class UserController {
    protected $db;

    public function __construc() {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Load Admin Page
     * 
     * @return void
     */
    public function admin() {
        loadView('admin/index');
    }
}