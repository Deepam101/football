<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="register.css">
  <title>Login</title>
</head>
<body>
  
 <h1 style="text-align: center;color: white;top: 50px;position: relative; ">The Football Hub </h1> 
<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">

      <div class="card-header">
        <div class="card-body">
            <form method="post" action="login.php">
              <!-- display errors here-->
              <?php include('errors.php'); ?><br>
                
            
                <div class="form-group">
                  
                  <input type="text" name="username" placeholder="username">
                </div>
                <div class="form-group">
                
                  <input type="password" name="password" placeholder="password"><br>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-success" name="login">
                </div>
                <p style="color: white;">New here?<a href="register.php">Register</a><br>
                <span style="color: white;">Go to </span><a href="index.php">Home</a></p>
              </form></div></div></div></div></div> 
</body>
</html>