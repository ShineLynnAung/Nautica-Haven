<?php
session_start();


if (!isset($_SESSION['user']) || $_SESSION['user'] ['role'] !== 'staff') {
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
    <style>
        .aa{
        text-decoration: none;
        color: black;
    }

    .aa:hover{
        color:black;
    }

    .bbg{
        background-color: #c6c5ca;
        width: 100%;
    }

    .li{
        text-transform: uppercase;
        text-decoration: none;
        font-weight: bold;
    }

    .text-danger{
        color:red !important;
        font-weight:bold;
    }
    </style>
</head>
<body>
<div class="row bbg mb-4">
            <div class="col-lg-6" class="aa"><h1 class="mt-5 mb-3 ps-3">Nautica Haven</h1></div>
            <div class="col-lg-6 d-flex justify-content-end">
            <button class="btn btn-link mt-5 mb-3 text-danger li pe-3" onclick="Logout()"><h6>Log Out</h6></button>
            </div>
        </div>

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
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Creator</th>
                        <th>Created Date</th>
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
                        <?php echo "<img src='../images/{$row['path']}' alt='Post Image' style='height: 100%; max-height:100px'>"?>
                        </td>
                        <td class="info"><?= htmlspecialchars($row["title"]) ?></td>
                        <td class="info"><?=  htmlspecialchars($row["user_name"])  ?></td>
                        <td class="info"><?=  htmlspecialchars($row["create_date"])  ?></td>
                        
                    </tr>
                <?php
                endforeach;
                ?>
            </table>
            </div>
        </div>
    <!--  -->

    </div>
    <script src="../js/sweet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>