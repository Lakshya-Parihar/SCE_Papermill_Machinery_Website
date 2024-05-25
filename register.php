<?php
include 'config/dbcon.php';
// Define variables and initialize with empty values
$name = $email = $mobile = $pwd = "";
$name_err = $email_err = $mobile_err = $pwd_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate username

  if (empty(trim($_POST["name"]))) {
    $name_err = "Please enter a name.";
  } else {
    $name = trim($_POST["name"]);
  }

  // Validate email
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter your email.";
  } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
    $email_err = "Invalid email format.";
  } else {
    $email = trim($_POST["email"]);
  }
  // Validate password
  if (empty(trim($_POST["pwd"]))) {
    $pwd_err = "Please enter a password.";
  } elseif (strlen(trim($_POST["pwd"])) < 8) {
    $pwd_err = "Password must have at least 8 characters.";
  } else {
    $pwd = trim($_POST["pwd"]);
  }

  if (empty(trim($_POST["mobile"]))) {
    $mobile_err = "Please enter your contact number.";
  } elseif (strlen(trim($_POST['mobile'])) < 10 || strlen(trim($_POST['mobile'])) > 10) {
    $mobile_err = "Mobile No must have 10 characters.";
  } else {
    $mobile = trim($_POST["mobile"]);
  }

  // Check input errors before inserting in database
  if (empty($name_err) && empty($email_err) && empty($pwd_err) && empty($mobile_err)) {

    $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND  pwd = '$pwd'") or die('failed');

    if(mysqli_num_rows($select) > 0){
      echo "<script>alert('User already Exists!!')</script>";
    }
    
    else{
    // Prepare an insert statement
    $sql = "INSERT INTO users (name, email, pwd, contact) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_email, $param_pwd, $param_mobile);

      // Set parameters
      $param_name = $name;
      $param_email = $email;
      $param_pwd = $pwd; 
      $param_mobile= $mobile;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page
        $alert_message = "Registration Successfull!!";
        $redirect_url = "login.php";
    
        echo "<script>alert('$alert_message'); window.location.href = '$redirect_url';</script>";
        exit; // Stop further execution
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    

      // Close statement
      mysqli_stmt_close($stmt);
    
    }
  }
}
  

  // Close connection
  mysqli_close($conn);
}

?>




<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style=" background: url(images/reg-log_bg.jpg)">
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
                <!-- <form method="post" action="register.php"> -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">
                    <div class="mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="form3Example1" value="<?php echo $name; ?>">User Name</label>
                        <input type="text" name="name" class="form-control" />
                        <span class="error">
                          <?php echo $name_err; ?>
                        </span>
                      </div>
                    </div>
                  </div>

                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3" value="<?php echo $email; ?>">Email address</label>
                    <input type="email" name="email" class="form-control" />
                    <span class="error">
                      <?php echo $email_err; ?>
                    </span>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3" value="<?php echo $mobile; ?>">Contact No.</label>
                    <input type="text" name="mobile" class="form-control" />
                    <span class="error">
                      <?php echo $mobile_err; ?>
                    </span>
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4" value="<?php echo $pwd; ?>">Password</label>
                    <input type="password" name="pwd" class="form-control" />
                    <span class="error">
                      <?php echo $pwd_err; ?>
                    </span>
                  </div>


                  <!-- Submit button -->
                  <center>
                  <button type="submit" class="btn btn-primary btn-block mb-4">
                    Register
                  </button>
                  </center>

                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>Already have an Account. <a href="./login.php">Sign-In</a></p>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>