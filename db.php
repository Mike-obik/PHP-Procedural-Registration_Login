<?php
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "sample_web_project";
    
    $con = mysqli_connect($server,$username,$password,$database); // Database connection string
    //$con = mysqli_connect("localhost","root","","login_register");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>