<?php
    class Database {
        // DB Params
        private $url;
        private $dbparts;
        private $host;
        private $database;
        private $username;
        private $password;
        private $conn;

        public function __construct() {
            $url = getenv('JAWSDB_URL');
            $dbparts = parse_url($url);
            $host = dbparts['host'];
            $username = dbparts['user'];
            $password = dbparts['pass'];
            $database = ltrim($dbparts['path'],'/');
        }

        // DB Connect
        public function connect() {
            $this->conn = null;

            try {
                $this->conn = new PDO('mysql:host=' . this->$host . 'dbname=' . $this->$database, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'Connection Error: ' . $e->getMessage();
            }
            
            return $this->conn;
        }
    }
