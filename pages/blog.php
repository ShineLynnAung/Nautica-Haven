<?php
require_once('../function/getall.php');
$posts = fetchPosts($conn);
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
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <li><a class="dropdown-item" href="Facilitlies.html">FACILITIES& AMENITIES</a></li>
                            <li><a class="dropdown-item" href="Dining.html">Dining</a></li>
                            <li><a class="dropdown-item" href="spa.html">Spa</a></li>
                            <li><a class="dropdown-item" href="tent.html">Rooms</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <!-- Toggle Language Button -->
                    <li class="nav-item">
                        <div class="nav-link language-toggle" title="language">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path fill="#5cb145" d="M1 11H31V21H1z"></path><path d="M5,4H27c2.208,0,4,1.792,4,4v4H1v-4c0-2.208,1.792-4,4-4Z" fill="#f6ce46"></path><path d="M5,20H27c2.208,0,4,1.792,4,4v4H1v-4c0-2.208,1.792-4,4-4Z" transform="rotate(180 16 24)" fill="#d83b3f"></path><path d="M27,4H5c-2.209,0-4,1.791-4,4V24c0,2.209,1.791,4,4,4H27c2.209,0,4-1.791,4-4V8c0-2.209-1.791-4-4-4Zm3,20c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V8c0-1.654,1.346-3,3-3H27c1.654,0,3,1.346,3,3V24Z" opacity=".15"></path><path fill="#fff" d="M18.578 16.974L22.75 13.943 17.593 13.943 16 9.039 14.407 13.943 9.25 13.943 13.422 16.974 11.828 21.878 16 18.847 20.172 21.878 18.578 16.974z"></path><path d="M27,5H5c-1.657,0-3,1.343-3,3v1c0-1.657,1.343-3,3-3H27c1.657,0,3,1.343,3,3v-1c0-1.657-1.343-3-3-3Z" fill="#fff" opacity=".2"></path></svg>
                        </div> 
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        
    <div class="container content2 mt-5">
      
      <div class="row mt-5">

      <?php
            foreach ($posts as $p):
            ?>
            
                <div class="col-lg-4 mb-4 cont mt-5">
                <div class="content2" style="text-align: center;">
                <!-- Post Image -->
                    <img src="../posts/<?= htmlspecialchars($p['path']) ?>" 
                        alt="Post Image" 
                        class="img-fluid vimage" 
                        style="height: 100%; max-height: 250px; display: inline-block;">
                </div>

                    <!-- Post Title -->
                    <p class="info2 mt-2 text-center"><?= htmlspecialchars($p['title']) ?></p>
                    <div class="d-flex justify-content-center mb-4">
                        <a class="btn btn-primary mb-2" href="viewpost.php?id=<?= $p['id'] ?>" role="button">
                            See More...
                        </a>
                    </div>
                </div>
                
            <?php
            endforeach;
            ?>
      </div>
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

