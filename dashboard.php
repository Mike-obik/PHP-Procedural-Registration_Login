<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   
</head>

<!--Start Navbar-->
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
      <a class="navbar-brand text-white fw-bolder" href="#">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        </ul>
        <form class="d-flex" role="search">
        <a class="nav-link disabled text-white fw-bolder mt-2 mx-3" href="#">Hi <?php echo $_SESSION['username']; ?></a>
          <a href='logout.php' class="btn btn-danger fw-bolder text-decoration-none">Logout</a>
        </form>
      </div>
    </div>
  </nav>
<!--End Navbar-->

<hr>
<body style="background-color:#e2e2e2">
    <div class="container card">
        <h1>Hello, <?php echo $_SESSION['username']; ?>!</h1>
        <p class="fs-5">Welcome to your dashboard.</p>
        <p><a href="logout.php" class="btn btn-dark btn-block fw-bolder">Logout</a></p>
    </div>
    <hr>
</body>
</html>