<?php include('server.php'); ?>

<!DOCTYPE html>
  
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="stylesheet" href="header.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="register.css">
  <title>Register</title>
</head>
<body>
   <h1 style="text-align: center;color: white;top: 50px;position: relative; ">The Football Hub </h1> 
  <div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <div class="card-body">
        <form method="post" action="register.php">
          <!-- display errors here-->
          <div class="error"><?php include('errors.php'); ?></div><br>
              
            <div class="form-group">
                
              <input type="text" name="name" placeholder="Name">
                
            </div>    
        
            
              <div class="form-group">
              
              <input type="text" name="username" placeholder="Username">
             
              </div>
             <div class=" form-group">
               
              <input type="text" name="email" placeholder="E-mail">
            </div>
             <div class="form-group">
           
              <input type="password" name="password1" placeholder="Password">
            </div>
             <div class=" form-group">
                
              <input type="password" name="password2" placeholder="Re-enter password">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success" name="register">
            </div></form>
            <p><span style="color: white;">Already a member?</span><a href="login.php">Login</a><br>
            <span style="color: white;">Go to </span><a href="index.php">Home</a> </p>
          
</body>
</html>