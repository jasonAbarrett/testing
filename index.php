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


      // Positional parameters 
    //   $sql = 'SELECT * FROM posts WHERE author = ?';
    //   $stmt = $pdo->prepare($sql);
    //   $stmt->execute([$author]); 
    //   $posts = $stmt->fetchAll(); 

      //  Named Parameters 
      $sql = 'SELECT * FROM posts WHERE author = ?';
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$author]); 
      $posts = $stmt->fetchAll(); 


      //var_dump($posts); 
      foreach($posts as $post){
          echo $post->title . '<br>';
      }





      









