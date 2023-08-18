<?php
	session_start();
    require('db.php');
    //error_reporting(0);
	

    /* 
    ALTER TABLE users
    ADD UNIQUE (email);
    */
    // Declare variables
    if (isset($_REQUEST['submit'])) {
        $fullname = stripslashes($_REQUEST['fullname']); 
        $fullname = mysqli_real_escape_string($con, $fullname);
        $username = stripslashes($_REQUEST['username']); 
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $mobile    = stripslashes($_REQUEST['mobile']);
        $mobile    = mysqli_real_escape_string($con, $mobile);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $error="avoid duplicate values";
        $success="You have registered successfully";
        

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($result);

        if ($num ==1) {
            echo "<h3 class='container text-center bg-danger text-white fw-bolder p-2'>".$error."</h3>";
        } else {
        
        $result    = "INSERT into users (fullname, username, email, mobile, password, create_datetime)
                     VALUES ('$fullname', '$username', '$email', '$mobile', '" . sha1($password) . "', '$create_datetime')";
        mysqli_query($con, $result);
        echo "<h3 class='container text-center bg-success text-white fw-bolder p-2'>".$success."</h3>";
    }
       
    } 
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   
</head>
<!-- https://blog.hubspot.com/website/bootstrap-form-template -->

<body style="background-image: linear-gradient(to right, #33001b, #ff0084); ">

<!--Start Navbar-->
<nav class="navbar navbar-expand-lg bg-dark bg-opacity-50">
    <div class="container">
      <a class="navbar-brand text-white fw-bolder" href="#">Engr. Mike</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        </ul>
        <form class="d-flex" role="search">
        <a class="nav-link disabled text-white fw-bolder mt-2 mx-3" href="register.php">Register</a>
        <a class="nav-link disabled text-white fw-bolder mt-2 mx-3" href="login.php">Login</a>
          
        </form>
      </div>
    </div>
  </nav>
<!--End Navbar-->

<div class="container">
<div class="card bg-dark bg-gradient bg-opacity-50 pt-5" style="height:100vh">
<article class="card-body mx-auto" style="max-width: 100%;">
	<h4 class="card-title mt-3 text-center fw-bolder text-white">SIGN UP</h4>
	<form method="POST" action="">
	<div class="form-group input-group mb-2">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="bi-people-fill fs-5"></i> </span>
		 </div>
        <input name="fullname" class="form-control" placeholder="Fullname" type="text" required>
    </div> <!-- form-group// -->

    <div class="form-group input-group mb-2">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="bi-person-fill fs-5"></i> </span>
		 </div>
        <input name="username" class="form-control" placeholder="Username" type="text" required>
    </div> <!-- form-group// -->

    <div class="form-group input-group mb-2">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="bi-envelope-fill fs-5"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email" type="email" required>
    </div> <!-- form-group// -->
    <div class="form-group input-group mb-2">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="bi-telephone-fill fs-5"></i> </span>
		</div>
    	<input name="mobile" class="form-control" placeholder="Mobile Number" type="text" required>
    </div> <!-- form-group// -->
    
    <div class="form-group input-group mb-2">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="bi-lock-fill fs-5"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Password" type="password" required>
    </div> <!-- form-group// --> 
                                        
    <div class="form-group">
        <button type="submit" class="btn btn-primary fw-bolder" name="submit"> SIGN UP  </button>
    </div> <!-- form-group// -->      
    <p class="text-center fw-bolder text-white">Already have an account ? <a href="login.php" class="fw-bolder text-primary text-decoration-none">SIGN IN</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->


<script src="js/main.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>