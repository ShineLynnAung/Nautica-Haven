<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user'] ['role'] !== 'admin') {
  header('Location: login.php');
    exit(); 
}


require_once('../function/getall.php');
$posts = fetchPosts($conn);

    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nautica Haven</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">    
    
</head>
<body>
    <?php
        require_once('ahead.php');
    ?>
    <div class="container">
   

        <div class="row">
            <div class="col-lg-4">
                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-center">
                 <h4>Posts</h4>
                </div>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                    <a href="postcreate.php" class="btn btn-primary"><h6>Create Post</h6></a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-3 bg">
                  <h6 class="mt-2">Name: <?=  $_SESSION['user']['name']?></h6><br>
                  <h6>Email: <?=  $_SESSION['user']['email']?></h6><br>
                  <h6>Role: <?=  $_SESSION['user']['role']?></h6><br>
            </div>

            <div class="col-lg-9">
            <table class="table table-hover table-dark">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Creator</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                $counter = 1;
                // Fetch each row as an associative array and display it
                foreach ($posts as $row):
                ?>
                    <tr>
                       
                        <td><?= $counter++ ?></td>
                        <td>
                           <?php echo "<img src='../posts/{$row['path']}' alt='Post Image' style='height: 100%; max-height:100px'>"?>
                        </td>
                        <td class="info"><?= htmlspecialchars($row["title"]) ?></td>
                        <td class="info"><?=  htmlspecialchars($row["user_name"])  ?></td>
                        <td class="info"><?=  htmlspecialchars($row["create_date"])  ?></td>
                        <td class="info"><button class="btn btn-outline-danger" onclick="deletepost(<?= $row['id'] ?>)">
                                Delete
                </button>
                            <a class="btn btn-outline-primary" href="postedit.php?id=<?= $row['id'] ?>" role="button">
                                Edit
                            </a></td>
                    </tr>
                <?php
                endforeach;
                ?>
            </table>
        </div>
         </div>
                </div>
    </div>

    <script src="../js/sweet.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>