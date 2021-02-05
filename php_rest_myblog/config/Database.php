<?php 
    class Database {
        //DB parameters 
        private $host = 'localhost'; 
        private $db_name = 'myblog';
        private $username = 'root';
        private $password = '';
        private $conn;

        //DB connect 
        public function connect() {
            $this->conn = null;

            try { 
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, 
                $this->username, $this->password);        
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOExemption $e) {
                echo 'Connection error:  ' . $e->getMessage();
            }       

            return $this->conn;
    }

    }

