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
    }
    .hr{
        border-bottom: 2px solid black !important; 

    }
</style>
<div class="row bbg mb-4">
            <div class="col-lg-8"><a href="admindashboard.php" class="aa"><h1 class="mt-5 mb-3 ps-3">Nautica Haven</h1></a></div>
            <div class="col-lg-2 d-flex justify-content-end">
                <a href="memberlist.php" class="btn btn-link mt-5 mb-3 text-primary li pe-3"><h6>Member list</h6></a>
            </div>
            <div class="col-lg-2 d-flex justify-content-end">
                <button class="btn btn-link mt-5 mb-3 text-danger li pe-3" onclick="Logout()"><h6>Log Out</h6></button>
            </div>
        </div>
       
        <script src="../js/sweet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>