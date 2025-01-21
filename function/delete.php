<?php
require_once('db.php');

$id = $_GET['id'] ?? null;

if ($id) {
    // Sanitize the ID to ensure it's an integer
    $id = intval($id);
    // Prepare the DELETE SQL query
    $sql = "DELETE FROM posts WHERE ID = $id";

    if ($conn->query($sql)) {
        // Successful deletion
        header("Location: ../Admin page/admindashboard.php");
        exit();
    } else {
        // Error in deletion
        echo "Error deleting record: " . $conn->error;
    }
}
?>