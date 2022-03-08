<?php
    class Database {
        // DB Params
        private $host = "nnsgluut5mye50or.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        private $db_name = "p0u5g6rpoaolgc6c";
        private $username = "g8r02e1umo4jrmi8";
        private $password = getenv('PASSWORD');
        private $conn;

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
