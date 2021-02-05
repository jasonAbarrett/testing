<?php 
    class Post { 
        //DB stuff 
        private $conn; 
        private $table = 'posts'; 

        //Post properties 
        public $id; 
        public $category_id; 
        public $category_name; 
        public $title; 
        public $body; 
        public $author; 
        public $created_at; 

        //Constructor with DB 
        public function __construct($db) {
            $this->conn = $db;  

        }

        //Get Posts
        public function read() {
            //Create query
            $query = 'SELECT
                -- c.name as category_name,
                posts.id, 
                posts.category_id, 
                posts.title, 
                posts.body, 
                posts.author,
                posts.created_at
            FROM 
                posts'; 
                        
                

        
        //Prepare statement 
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();
        
        return $stmt;
        
        }

    }