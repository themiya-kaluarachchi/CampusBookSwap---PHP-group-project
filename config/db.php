<?php

require_once __DIR__ . '/../.config.php';
 class Database{
    private static $instance = null;
    private $connection;

    private $host = DB_HOST;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $dbname = DB_NAME;

     private function __construct(){
       $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);

       if($this->connection->connect_error){
            die("Connection failed: " . $this->connection->connect_error);
       }
     }

     public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new Database();
        }
        return self::$instance;
     }

     public function getConnection(){
        return $this->connection;
     }

     public function closeConnection(){
        $this->connection->close();
        self::$instance = null;
     }
 }