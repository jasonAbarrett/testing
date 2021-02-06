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
                categories.name as category_name,
                posts.id, 
                posts.category_id, 
                posts.title, 
                posts.body, 
                posts.author,
                posts.created_at
            FROM 
                ' . $this->table . '
                join categories on posts.category_id = categories.id
            ORDER BY 
                posts.created_at, 
                category_name ASC
                
                '; 
                        
                       
        //Prepare statement 
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();
        
        return $stmt;
        
        }

         // Get Single Post
        
         public function read_single() {
        
        // Create query
            $query = 'SELECT
                    categories.name as category_name,
                    posts.id, 
                    posts.category_id, 
                    posts.title, 
                    posts.body, 
                    posts.author,
                    posts.created_at
                FROM 
                    ' . $this->table . '
                    join categories on posts.category_id = categories.id
                                    
                WHERE 
                    posts.id = ?
                LIMIT 0, 1
                '; 
        
            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->id);

            // Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set properties
            $this->title = $row['title'];
            $this->body = $row['body'];
            $this->author = $row['author'];
            $this->category_id = $row['category_id'];
            $this->category_name = $row['category_name'];
            $this->created_at = $row['created_at'];
            
         }






        


         
    }