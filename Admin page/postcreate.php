<?php
session_start();

if (!isset($_SESSION['user'])){
    header('Location: login.php');
      exit(); 
}
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
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="custom-card">
      <h4 class="mb-3">Add New Post</h4>
      <form METHOD="POST" action="../function/create.php" enctype="multipart/form-data">
      <input type="hidden" name="user_name" value="<?= $_SESSION['user']['name'] ?>">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Description</label>
          <textarea class="form-control" id="content" rows="4" placeholder="Type post here" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="path" class="form-label">Upload Image</label>
            <div class="custom-file-input">
                <button type="button" class="btn btn-light border" onclick="document.getElementById('image').click();">
                <i class="fa-regular fa-image"></i>
                </button>
                <span id="fileName" class="ms-2"></span>
                <input type="file" class="form-control d-none" id="image" accept="image/*" onchange="previewImage(event)" name="path" required>
            </div>
            <img id="imagePreview" class="preview-img d-none" alt="Image Preview"><br>
            <button type="button" class="btn btn-danger mt-2 d-none" id="removeImageBtn" onclick="removeImage()">X</button>
        </div>
        <div class="d-flex justify-content-between">
        <?php   
            if($_SESSION['user']['role']==='admin'){
                echo '<a href="admindashboard.php" class="btn btn-secondary">Cancel</a>';
            }elseif($_SESSION['user']['role']==='staff'){
                echo '<a href="staffdashboard.php" class="btn btn-secondary">Cancel</a>';
            }
            ?>
          <button type="submit" class="btn btn-purple" name="create">Publish</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function previewImage(event) {
        const fileInput = event.target;
        const fileNameSpan = document.getElementById('fileName');
        const imagePreview = document.getElementById('imagePreview');
        const removeImageBtn = document.getElementById('removeImageBtn');
        
        const file = fileInput.files[0];
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('d-none');
                imagePreview.style.maxWidth = "200px";
                imagePreview.style.marginTop = "10px";
                
                fileNameSpan.textContent = file.name; // Show the file name
                removeImageBtn.classList.remove('d-none'); // Show the remove button
            };
            
            reader.readAsDataURL(file);
        }
    }
    
    function removeImage() {
        const fileInput = document.getElementById('image');
        const fileNameSpan = document.getElementById('fileName');
        const imagePreview = document.getElementById('imagePreview');
        const removeImageBtn = document.getElementById('removeImageBtn');
        
        // Clear the file input
        fileInput.value = "";
        
        // Reset the preview and hide elements
        fileNameSpan.textContent = "";
        imagePreview.src = "#";
        imagePreview.classList.add('d-none');
        removeImageBtn.classList.add('d-none');
    }
  </script>
</body>
</html>
