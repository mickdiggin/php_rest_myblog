<?php
    class Database {
        // DB Params
        private $host = getenv('HOST');
        private $db_name = getenv('DB_NAME');
        private $username = getenv('USERNAME');
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
