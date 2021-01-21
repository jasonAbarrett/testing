<?php

    $host = 'localhost'; 
    $user = 'root';
    $password = '';
    $dbname = 'pdoposts';
    

    // set DSN - data source name - string that has data structure to describe a connection to a data source 
    $dsn = 'mysql:host=' . $host .';dbname=' . $dbname;
    
    // create PDO instance 
    $pdo = new PDO($dsn, $user, $password); 
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    // need to do below line to get the limit to work - emulation issue
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    # PDO QUERY   
    // $stmt = $pdo->query('SELECT * FROM posts');
    //     while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    //         echo $row['title'] . '<br>';
    //     }
        // while($row = $stmt->fetch(PDO::FETCH_OBJ)){
        //     echo $row->title . '<br>';
        // }


    # PREPARED STATEMENTS (prepare & execute)

            // UNSAFE EXAMPLE 
            //$sql = "SELECT * FROM posts WHERE author = '$author'";

      // FETCH MULTIPLE POSTS           
      
      //User Input 
      $author = 'Brad';
      $is_published = true; 
      $id = 1;
      $limit = 3;

      // Positional parameters 
      $sql = 'SELECT * FROM posts WHERE author = ? && is_published = ? LIMIT ?';
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$author, $is_published, $limit]); 
      $posts = $stmt->fetchAll(); 

          
      //  Named Parameters 
      // $sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
      // $stmt = $pdo->prepare($sql);
      // $stmt->execute(['author' => $author, 'is_published' => $is_published]); 
      // $posts = $stmt->fetchAll(); 


      //var_dump($posts); 
      foreach($posts as $post){
          echo $post->title . $post->author .  '<br>';
      }


    // FETCH SINGLE POST 
    //    $sql = 'SELECT * FROM posts WHERE id = :id';
    //   $stmt = $pdo->prepare($sql);
    //   $stmt->execute(['id' => $id]); 
    //   $posts = $stmt->fetch();
      

      //can do below, better to separate logic from output, or  
      // even better to use a template engine, like handlebars.js, mustache  
      
        
       //<h1><?php echo $posts->title; 
            //</h1>
       // <p><?php echo $posts->body . $posts->created_at; </p>


      // GET ROW COUNT 
    //     $stmt = $pdo->prepare('SELECT * FROM posts WHERE author = ?');
    //     $stmt->execute([$author]);
    //     $postCount = $stmt->rowCount();
    //     echo $postCount;
    
    
    // INSERT DATA
    // $title = 'post five';
    // $body = 'this is post five';
    // $author = 'franklin'; 

    // $sql = 'INSERT INTO posts(title, body, author) VALUES (:title, :body, :author)';
    // $stmt = $pdo->prepare($sql); 
    // $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
    // echo 'post added';


    // UPDATE DATA 
    // $id = 1; 
    // $body = 'this is the updated body';
    
    // $sql = 'UPDATE posts SET body = :body WHERE id = :id';
    // $stmt = $pdo->prepare($sql); 
    // $stmt->execute(['body' => $body, 'id' => $id]);
    // echo 'post has been updated';


    // DELETE DATA 
    // $id = 3; 
    
    // $sql = 'DELETE FROM posts WHERE id = :id';
    // $stmt = $pdo->prepare($sql); 
    // $stmt->execute(['id' => $id]);
    // echo 'post has been deleted';


    //SEARCH DATA
    //   $search = "%five%";
    // $sql = 'SELECT * FROM posts WHERE title LIKE ?';
    //   $stmt = $pdo->prepare($sql);
    //   $stmt->execute([$search]); 
    //   $posts = $stmt->fetchAll(); 

 
    //   foreach($posts as $post){
    //       echo $post->title . ' ' . $post->author .  '<br>';
    //   }



    






