<?php

class Database {
    protected $conn;

    /**
     * Database Connection
     *
     * @param array $config
     */
    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};port={$config['port']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);

            // Set error mode to exception to handle errors more gracefully 
            // $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            throw new Exception('Failed', $e->getMessage());
        }
    }

    /**
     * Query to database 
     * 
     * @param string @query 
     * @return PDOStatement
     * @throws PDOException
     */
    public function query($query, $params = []) {
        try {
            $sth = $this->conn->prepare($query);

            // bind named parameters
            foreach($params as $param=>$value) {
                $sth->bindValue(':'.$param, $value);
            }
            
            $sth->execute();

            return $sth;
        } catch(PDOException $e) {
            throw new Exception('Query failed to execute: ' . $e->getMessage());
        }
    }


}