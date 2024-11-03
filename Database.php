<?php

class Database {
    protected $conn;

    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};port={$config['port']}";

        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password']);

            // Set error mode to exception to handle errors more gracefully 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            throw new Exception('Failed', $e->getMessage());
        }
    }
}