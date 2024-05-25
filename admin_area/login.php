<?php

session_start();

include("includes/dbcon.php");

?>
<!DOCTYPE HTML>
<html>

<head>

  <title>Admin Login</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

  <style>
    #h1 {
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
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style=" background: url(../Images/reg-log_bg.jpg)">
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
                    <input type="email" name="admin_email" class="form-control" />
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">Password</label>
                    <input type="password" name="admin_pass" class="form-control" />
                  </div>
                  <!-- Submit button -->
                  <center><button type="submit" name="submit" class="btn btn-primary btn-block mb-4">LOGIN</button></center>

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

<?php

if (isset($_POST['submit'])) {

  $admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);

  $admin_pwd = mysqli_real_escape_string($conn, $_POST['admin_pass']);

  $get_admin = "SELECT * FROM admin WHERE admin_email='$admin_email' AND admin_password='$admin_pwd'";

  $run_admin = mysqli_query($conn, $get_admin);

  $count = mysqli_num_rows($run_admin);

  if ($count == 1) {

    $_SESSION['admin_email'] = $admin_email;

    echo "<script>window.open('index.php?dashboard','_self')</script>";
  } else {

    echo "<script>alert('Email or Password is Wrong')</script>";
  }
}

?>