<?php
session_start();

if (!isset($_SESSION['user'])){
    header('Location: login.php');
      exit(); 
}

require_once('../function/edit.php');
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Invalid post ID.";
    exit;
}

$post_id = (int)$_GET['id']; 

$query = "SELECT * FROM posts WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $post_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Post not found.";
    exit;
}

$post = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f0f0f0;
      font-family: Arial, sans-serif;
    }
    .custom-card {
        width: 40%;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
    .btn-purple {
      background-color: #6a0dad;
      color: white;
    }
    .btn-purple:hover {
      background-color: #540b9e;
    }
    .preview-img {
      max-height: 200px;
      margin-top: 10px;
      border-radius: 8px;
    }
    .up{
        width:0px;
        height:0px;
    }
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center vh-100 mt-5">
    <div class="custom-card mt-5">
      <h4 class="mb-3">Add New Post</h4>
      <form METHOD="POST" action="../function/edit.php" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= htmlspecialchars($post['id'], ENT_QUOTES) ?>">
      <input type="hidden" name="user_name" value="<?= $_SESSION['user']['name'] ?>">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?= htmlspecialchars($post['title'], ENT_QUOTES) ?>">
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Description</label>
          <textarea class="form-control" id="content" rows="4" placeholder="Type post here" name="description"><?= htmlspecialchars($post['description'], ENT_QUOTES) ?></textarea>
        </div>
        <div class="mb-3">
    <label for="path" class="form-label">Upload Image</label>
    <div class="custom-file-input">
        <button type="button" class="btn btn-light border" onclick="document.getElementById('image').click();">
            <i class="fa-regular fa-image"></i> Choose Image
        </button>
        <span id="fileName" class="ms-2"></span>
        <input type="file" class="form-control d-none" id="image" accept="image/*" name="path" onchange="previewImage(event)">
    </div>
    <img src="<?= isset($post['path']) ? $post['path'] : '' ?>" 
         id="imagePreview" 
         class="preview-img <?= isset($post['path']) ? '' : 'd-none' ?>" 
         alt="Image Preview">
</div>

        <div class="d-flex justify-content-between">
        <?php   
            if($_SESSION['user']['role']==='admin'){
                echo '<a href="admindashboard.php" class="btn btn-secondary">Cancel</a>';
            }elseif($_SESSION['user']['role']==='staff'){
                echo '<a href="staffdashboard.php" class="btn btn-secondary">Cancel</a>';
            }
            ?>
          <button type="submit" class="btn btn-purple" name="edit">Publish</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function previewImage(event) {
      const imagePreview = document.getElementById('imagePreview');
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function () {
          imagePreview.src = reader.result;
          imagePreview.classList.remove('d-none');
        };
        reader.readAsDataURL(file);
      } else {
        imagePreview.classList.add('d-none');
        imagePreview.src = '';
      }
    }
  </script>
</body>
</html>
