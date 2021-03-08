<?php

    //headers - * means api is public to anyone 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Post.php';
    
    //Instantiate DB and connect 
    $database = new Database();
    $db = $database->connect(); 

    //instantiate blog post object 
    $post = new Post($db);


        
    //to get id value, like domain.com?id=3, $_GET['id'] gets the 3 
    // turnary operators, if isset to id, ? (then) .., : (else)
    // Get ID
    $post->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get post
    $post->read_single();

    // Create array
    $post_arr = array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name,
    'created_at' => $post->created_at
    );

     // Make JSON
     print_r(json_encode($post_arr));