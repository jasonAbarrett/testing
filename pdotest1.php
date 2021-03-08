



<?php

    $host = 'localhost'; 
    $user = 'root';
    $password = '';
    $dbname = 'pdoposts';
    



  try {
    // set DSN - data source name - string that has data structure to describe a connection to a data source 
    $dsn = 'mysql:host=' . $host .';dbname=' . $dbname;
    
    // create PDO instance 
    $pdo = new PDO($dsn, $user, $password); 
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    // need to do below line to get the limit to work - emulation issue
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

   


    # PREPARED STATEMENTS (prepare & execute)

            // UNSAFE EXAMPLE 
            //$sql = "SELECT * FROM posts WHERE author = '$author'";

      // FETCH MULTIPLE POSTS           
      
      //User Input 
      $author = '';
      $is_published = true; 
      $id = '';
      $limit = '';

      // Positional parameters 
     // $sql = 'SELECT * FROM posts WHERE author = ? && is_published = ? LIMIT ?';
      $sql = 'SELECT * FROM posts WHERE is_published = ?';
     
      $stmt = $pdo->prepare($sql);
     // $stmt->execute([$author, $is_published, $limit]); 
      $stmt->execute([$is_published]); 
     
     
      $posts = $stmt->fetchAll(); 

          
      //  Named Parameters 
      // $sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
      // $stmt = $pdo->prepare($sql);
      // $stmt->execute(['author' => $author, 'is_published' => $is_published]); 
      // $posts = $stmt->fetchAll(); 


      //var_dump($posts); 
      foreach($posts as $post){
          echo $post->title . ' ' . $post->body . ' ' . $post->author .  '<br>';
        }




   
    
    // INSERT DATA
    // $title = 'post five';
    // $body = 'this is post five';
    // $author = 'franklin'; 

    // $sql = 'INSERT INTO posts(title, body, author) VALUES (:title, :body, :author)';
    // $stmt = $pdo->prepare($sql); 
    // $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
    // echo 'post added';



  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;

?>





    






