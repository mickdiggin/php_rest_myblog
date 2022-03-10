<?php
    class Database {
        // DB Params
        private $host;
        private $db_name;
        private $username;
        private $password;
        private $conn;

        public function __construct() {
            $host = "nnsgluut5mye50or.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;port=3306";
            $db_name = "p0u5g6rpoaolgc6c";
            $username = "g8r02e1umo4jrmi8";
            $password = getenv('PASSWORD');
        }

        // DB Connect
        public function connect() {
            $this->conn = null;

            try {
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'Connection Error: ' . $e->getMessage();
            }
            
            return $this->conn;
        }
    }
