<?php

$showAlert=false;
$showError=false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include 'partials/_dpconnect.php';
        $username=$_POST['username'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        // $exists=false;
        //check whether this username exists
        $existSql="select *from users where username='$username';";
        $result=mysqli_query($conn,$existSql);
        $numExistRows=mysqli_num_rows($result);
        if($numExistRows>0){
          // $exists=true
          $showError="Username Already Exists";
        }else{
          // $exists=false;
          if(($password==$cpassword) && $exists==false){
              $sql="insert into users(username,password) values('$username','$password')";
              $result=mysqli_query($conn,$sql);
              if($result){
                  $showAlert=true;
              }
          }else{
              $showError="password do not match";
          }
        }
    }
    


?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Signup</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>

    <?php
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>SUCCESS!</strong> Your account is now created and you can created.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';

    }
    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> '.$showError.'
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';

    }
?>
<div class="container">
    <h1 class="text-center">Signup to our website</h1>
    <form action="signup.php" method="post">
  <div class="form-group ">
    <label for="username">Username</label>
    <input type="text" maxlength="11" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter Username">
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" maxlength="23" class="form-control" id="password" name ="password" placeholder="Password">
</div>
<div class="form-group">
    <label for="cpassword">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
    <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
  </div>
 
  <button type="submit" class="btn btn-primary">Signup</button>
</form>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>