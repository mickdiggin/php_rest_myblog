<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    echo getcwd();
    include_once '../config/Database.php';
    include_once '../../../models/Post.php';
    echo "Instantiate DB and connect";
    // Instantiate DB & Connect
    $database = new Database();
    $db = $database->connect();
    echo "Instantiate blog post object";
    // Instantiate blog post object
    $post = new Post($db);
    echo "Blog post query";
    // Blog post query
    $result = $post->read();
    echo "Row count";
    // Get row count
    $num = $result->rowCount();

    // Check if any posts
    if($num > 0) {
        echo "Found posts.";
        // Post array
        $posts_arr = array();
        $posts_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            echo "Extracting row.";
            $post_item = array(
                'id' => $id,
                'title' => $title,
                'body' => html_entity_decode($body),
                'author' => $author,
                'category_id' => $category_id,
                'category_name' => $category_name
            );

            // Push to "data"
            array_push($posts_arr['data'], $post_item);

        }

        //Turn to JSON & output
        echo json_encode($posts_arr);
    } else {
        //No posts
        echo json_encode(
            array('message' => 'No posts found.')
        );
    }
