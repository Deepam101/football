<?php include('server.php'); 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="header.css" type="text/css">
  <link rel="stylesheet" href="home.css" type="text/css">
  <link rel="stylesheet" href="show.css" type="text/css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://kit.fontawesome.com/361990fe0a.js"></script>
  <title >The Football Hub</title>
  
</head>
<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top conatiner">
  <div class="container">
    <a class="navbar-brand" href="#"><span class="text">The Football Hub</span></a>
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive" >
     <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){ ?>
      <li class="nav-item ">
        <a class="nav-link" href="#">Your Account</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="index.php?logout='1'">Logout</a>
      </li> 
      <?php }else{ ?>
      
      <li class="nav-item ">
        <a class="nav-link" href="register.php">Sign Up</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="login.php">Login</a>
      </li>
   <?php } ?>
     </ul>
  </div> 

</nav>
