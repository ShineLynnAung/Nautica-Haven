<?php

require_once('../function/db.php');

if(isset($_POST['reg'])){
  $name     =$_POST['name'];
  $email    =$_POST['email'];
  $password =md5($_POST['password']);
  $role     =$_POST['role'];

  $validRoles = ['admin', 'staff'];

if (!in_array($role, $validRoles)) {
    die("Invalid role. Role must be 'admin' or 'staff'.");
}

  $query = "INSERT INTO users(name,email, password, role) VALUES ('$name','$email','$password','$role')";

  $result = mysqli_query($conn,$query);

  if($result == True){
    header('location:login.php');
  }else{
    echo "<script>alert('Error');</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nautica Haven</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  
	<!-- <link rel="stylesheet" href="../css/style.css"> -->
	 <style>
		
	 </style>
</head>
<body>
<section class="bg-light p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
        <div class="card border border-light-subtle rounded-4">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-5">
                  
                  <h4 class="text-center">Sign Up</h4>
                </div>
              </div>
            </div>
            <form action="signup.php" method="POST">
              <div class="row gy-3 overflow-hidden">
                <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                    <label for="name" class="form-label">Name</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                    <label for="email" class="form-label">Email</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                    <label for="password" class="form-label">Password</label>
                  </div>
                </div>

                <div class="form-floating mb-3">
                <select id="role" class="form-control" name="role">
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button name="reg" class="btn bsb-btn-xl btn-primary" type="submit">Register</button>
                  </div>
                </div>

                <div class="col-12">
            <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-center">
            <p class="mt-2 mb-2">Or</p>
            </div>
                  <div class="d-grid">
                    <a href="login.php" class="btn bsb-btn-xl btn-primary" type="submit">Login`</a>
                  </div>
                </div>
              </div>
            </form>
            

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
        
</body>
</html>