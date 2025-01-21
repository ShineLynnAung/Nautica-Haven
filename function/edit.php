<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session only if it's not already started
}
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id = $_POST['id']; // The post ID to be updated
    $title = $_POST['title'];
    $user_name = $_POST['user_name'];
    $description = $_POST['description'];
    $upload_dir = '../images/';
    $path = '';

    $query = "SELECT path FROM posts WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();

    if (!$post) {
        echo "Post not found.";
        exit;
    }

    $path = $post['path']; // Default to the existing image path

    // Handle new image upload if provided
    if (isset($_FILES['path']) && $_FILES['path']['error'] == UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES['path']['tmp_name'];
        $image_name = basename($_FILES['path']['name']);
        $target_file = $upload_dir . time() . '_' . $image_name;

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($image_tmp_name, $target_file)) {
            $path = $target_file; // Update path with new image
            // Optionally, delete the old image file
            if (file_exists($post['path'])) {
                unlink($post['path']);
            }
        } else {
            echo "Failed to upload the new image.";
            exit;
        }
    }

    // Update the post with new data
    $query = "UPDATE posts SET title = ?, description = ?, path = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $title, $description, $path, $id);

    if ($stmt->execute()) {
        echo '<script>
        swal("Edit Post", "Your post has been successfully updated!", "success");
        </script>';

        if ($_SESSION['user']['role'] === "admin") {
            echo"eeouoira";
            header('Location: ../Admin page/admindashboard.php');
            exit;
        } elseif ($_SESSION['user']['role'] === "staff") {
            echo"df;jsadfl";
            header('Location: ../Admin page/staffdashboard.php');
            exit;
        }
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
