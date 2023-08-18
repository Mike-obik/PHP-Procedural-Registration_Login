<?php
	session_start();
    require('db.php'); 
    //session for login
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: dashboard.php");
        exit;
    }
    
    // When form submitted, check and create user session.
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $error="Incorrect Username or Password";
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . sha1($password) . "'";
        $result = mysqli_query($con, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<h3 class='container text-center bg-danger text-white fw-bolder p-2'>".$error."</h3>";
        }
    } //else {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
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
	<h4 class="card-title mt-3 text-center fw-bolder text-white">SIGN IN</h4>
	<form>
    <div class="form-group input-group mb-2">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="bi-person-fill fs-5"></i> </span>
		 </div>
        <input name="username" class="form-control" placeholder="Username" type="text" required>
    </div> <!-- form-group// -->
    
    <div class="form-group input-group mb-2">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="bi-lock-fill fs-5"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Password" type="password" required>
    </div> <!-- form-group// --> 
                                         
    <div class="form-group">
        <button type="submit" class="btn btn-primary fw-bolder" name="submit"> SIGN IN  </button>
    </div> <!-- form-group// -->      
    <p class="text-center fw-bolder text-white">Don't have an account ? <a href="register.php" class="fw-bolder text-primary text-decoration-none">SIGN UP</a> </p>                                                                 
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