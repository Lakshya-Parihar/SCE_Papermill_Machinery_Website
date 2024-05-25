<?php
session_start();

include 'config/dbcon.php';
 $email =  $pwd = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];


    $sql = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' and pwd = '$pwd'") or die("Failed");

    if(mysqli_num_rows($sql) > 0)
    {
      $row = mysqli_fetch_assoc($sql);
      $_SESSION['user_id'] = $row['id'];
      $alert_message = "Login Successfull!.";
      $redirect_url = "customer/index.php";
  
      echo "<script>window.location.href = '$redirect_url';</script>";  
    }
    else{
      echo "<script>alert('Wrong Email Address or Password!!')</script>";
    }
  }

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <style>
    #h1{
      color: white;
      font-family: Helvetica, Arial, sans-serif;
    }
    .error {
      color: red;
    }
  </style>
    <!-- Section: Design Block -->
<section class="d-flex align-items-center justify-content-center vh-100">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style=" background: url(Images/reg-log_bg.jpg)">
      <div class="container">
        <div class="row gx-lg-5 align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <h1 class="my-5 display-3 fw-bold ls-tight" id="h1">
              SCE<br />
              The best offer <br />
              <span class="text-primary">for your business</span>
            </h1>
            <p style="color: hsl(217, 10%, 50.8%)">
              Unlock the Potential of Your Paper Mill with Our Machinery Solutions!
              Join our community of paper production enthusiasts by registering today.
              Gain access to exclusive insights, expert advice,
              and innovative machinery solutions tailored to enhance your operations.
              Let's embark on a journey towards efficiency,
              sustainability, and success in the paper industry together!
            </p>
          </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <form method="post">

                <!-- Email input -->
                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Email address</label>
                  <input type="email" name="email" class="form-control" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4">Password</label>
                  <input type="password" name="pwd" class="form-control" />
                </div>
                <!-- Submit button -->
                <center><button type="submit" name="sumbit" class="btn btn-primary btn-block mb-4">LOGIN</button></center>
                <div class="text-center">
                  <p>Don't have an Account. <a href="./register.php">Sign-Up</a></p>
                </div>

                </div>
 
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>