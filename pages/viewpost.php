<?php

require_once('../function/db.php');

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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nautica Haven</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Niconne&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        
        body {
            overflow-x: hidden;
            color: black;
        }

       .navbar-brand{
            color: black !important;
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
            background-color: rgba(121, 118, 118); 
        }
        .nav-link, .second-nav {
            margin-right: 10px;
            margin-left: 10px;
            color: black !important;
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            text-decoration: none;
        }
        .nav-link.active, .second-nav.active {
            border-bottom: 2px solid #3df42c;
        }

        .second-nav{
            font-size: 1.2em !important;
        }
        .section-title {
            text-align: center;
            margin: 40px 0;
            margin-top: 100px !important;
            font-size: 40px;
            font-family: 'Montserrat', sans-serif;

        }
        
        .icon{
            font-size: 2rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: bolder;
            text-align: left;
            color: white;
            margin: 10px;
        }
        .bless{
            font-size: 1.3em;
            font-family: 'Montserrat', sans-serif;
            text-align: left;
            color: white;
            margin: 0px; 
        }
        .bless2{
            font-size: 1.3em;
            font-family: 'Montserrat', sans-serif;
            text-align: left;
            color: white;
            margin: 20px; 
            text-decoration: none;
        }
       .link{
        text-decoration: none;
        font-size: .8em;
       }

        footer {
        padding: 10px 20px; 
        bottom: 0;
        width: 100%;
        
    }
    
    .content{
        margin-top: 15px;
    }
    .footer-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
        color: white;
    }

    .content2{
        margin-top: 30px;
    }

    .room-info{
        font-size: 1.2em;
        text-align: left !important;
    }
    .details{
        font-size: 1.1em;
    }

    .book{
        width: 200px;
        height: 50px;
        border-radius: 25px;
    }
    .book:hover{
        color: #3df42c;
        font-weight: bolder;
    }
    footer{
        width: 100%;
        height: 100%;
        background-color: black;
    }
    </style>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Nautica Haven</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-5">
                    <li class="nav-item">
                        <a class="nav-link me-5" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
        
    <div class="container content2 mt-5 wrap">
      <div class="mt-4 d-flex justify-content-center"><P class="info2"><?= htmlspecialchars($post['title'], ENT_QUOTES) ?></p></div>
      
      <div class="mt-4 mt-4 d-flex justify-content-center">
      <img src="../posts/<?= htmlspecialchars($post['path']) ?>" alt="Post Image" class="img-fluid cont" style="max-width: 60%; height: auto;">
      </div>

      <div class="mt-4 d-flex justify-content-center"><P class="postdesc" style="width: 60%;"><?= htmlspecialchars($post['description'], ENT_QUOTES) ?></p></div>
    </div>
    

     
    <footer class=" content2 footer">
        <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h3 class="icon">Nautica Haven</h3>
                <p class="bless">
                As we part ways, may your journey ahead be filled with joy, peace, and countless blessings.
                 Until we meet again, take care and stay safe.
                </p>
            </div>
        <div class="col-lg-4">
            <h3 class="icon">Contact Info</h3>
            <a href="tel:+95912345678" class="link"><pre class="bless2"><i class="bi bi-telephone-fill"> - 09123456789</i></pre></a>
            <a href="mailto:nauticahaven@gmail.com" class="link"><pre class="bless2"><i class="bi bi-envelope-fill"> - nauticahaven@gmail.com</i></pre></a>
            <a href="https://www.Nautica Haven.com" class="link"><pre class="bless2"><i class="bi bi-globe"> - www.Nautica Haven.com</i></pre></a>
            <a href="https://www.google.com/maps/@16.8395368,95.85189,10z?hl=en&entry=ttu&g_ep=EgoyMDI0MDkwOS4wIKXMDSoASAFQAw%3D%3D" class="link">
                <pre class="bless2"><i class="bi bi-geo-alt-fill"> - Yangon</i></pre></a>
        </div>
        <div class="col-lg-4">
            <h3 class="icon">Help Center</h3>
            <p class="bless2">Online Support</p>
            <p class="bless2">Privacy Police</p>
            <p class="bless2">Terms & Condition</p>
    
        </div>
    </div>
</div>
<hr style="border: 1px solid white;">
    
        <div class="footer-content">
            <p class="cpr">Copyright © 2024 Nautica Haven. All rights reserved.</p>
            <p class="name">Nautica Haven</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>  
</body>
</html>

