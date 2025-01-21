<?php
session_start();
require_once('db.php');

if (isset($_POST['create'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_name = $_POST['user_name'];
    $upload_dir = '../posts/';
    $path = '';

    
    if (isset($_FILES['path']) && $_FILES['path']['error'] == UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES['path']['tmp_name'];
        $image_name = basename($_FILES['path']['name']);
        $target_file = $upload_dir . time() . '_' . $image_name;

       
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

       
        if (move_uploaded_file($image_tmp_name, $target_file)) {
            $path = $target_file; // Save the relative path
        } else {
            echo "Failed to upload the image.";
            exit;
        }
    } else {
        echo "No file was uploaded.";
        exit;
    }

    
    $query = "INSERT INTO posts (title, description, user_name, path, create_date) VALUES ('$title', '$description', '$user_name', '$path', NOW())";

    $result = $conn->query($query);

    if ($result === TRUE) {
        echo '<script>
        swal("Create Post", "Your post has been successfully created!", "success");
        </script>';
        
        if ($_SESSION['user']['role'] === "admin") {
            header('Location: ../Admin page/admindashboard.php');
            exit;
        } elseif ($_SESSION['user']['role'] === "staff") {
            header('Location: ../Admin page/staffdashboard.php');
            exit;
        }
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
