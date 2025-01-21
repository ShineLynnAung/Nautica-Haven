<?php

require_once('db.php');


    function fetchPosts($conn) {
        $query = "SELECT * FROM posts";
    
        $result = $conn->query($query);
    
        if (!$result) {
            die("Query error: " . $conn->error);
        }
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
?>