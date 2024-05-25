<?php

session_start();

include("../config/dbcon.php");


$login = $_SESSION['user_id'];
if(!isset($login)){
    echo "<script>window.open('../login.php','_self')</script>";
}
else{
 

?>

<?php

if(isset($login)){

    $edit_id = $login;

    $get_user = "SELECT * FROM users WHERE id = '$edit_id'";

    $run_user = mysqli_query($conn,$get_user);

    $row_user = mysqli_fetch_array($run_user);

    $user_id = $row_user['id'];

    $user_name = $row_user['name'];

    $user_email = $row_user['email'];

    $user_pwd = $row_user['pwd'];

    $user_bio = $row_user['bio'];

    $user_dob = $row_user['dob'];

    $user_contact = $row_user['contact'];

}



?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCE!!</title>
    <link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<form action="user-profile.php" method="post">
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Account settings
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <hr class="border-light m-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $user_name; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="text" class="form-control mb-1" name="email" value="<?php echo $user_email; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Bio</label>
                                        <input class="form-control" name="bio" value="<?php echo $user_bio; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Birthday</label>
                                        <input type="text" class="form-control" name="dob" value="<?php echo $user_dob; ?>">
                                    </div> 
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="contact" value="<?php echo $user_contact; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="text" class="form-control" name="pwd" value="<?php echo $user_pwd; ?>">
                                    </div>
                                    <div class="text-right mt-3">
                                        <center><input type="submit" name="submit" class="btn btn-primary" value="Save Changes" style="width: 160px;">
                                        <a href="index.php" class="btn btn-primary" style="width: 200px;">Go To Home Page</a></center>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>



    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>




<?php

if(isset($_POST['submit'])){

$user_name = $_POST['name'];

$user_email = $_POST['email'];

$user_pwd = $user_pwd;

$user_new_pwd = $_POST['pwd'];

$user_bio = $_POST['bio'];

$user_dob = $_POST['dob'];

$user_contact = $_POST['contact'];


$update_user = "UPDATE users SET name = '$user_name', email = '$user_email', pwd = '$user_new_pwd', bio = '$user_bio', dob = '$user_dob', contact = '$user_contact' WHERE id = '$login'";

$run_user = mysqli_query($conn,$update_user);

if(($user_new_pwd) != ($user_pwd)){

    echo "<script>alert('User Has Been Updated successfully. Please login again')</script>";

    echo "<script>window.open('../login.php','_self')</script>";

    session_destroy();



}elseif($run_user){
    echo "<script>alert('User Has Been Updated successfully.)</script>";

    echo "<script>window.open('index.php','_self')</script>";

}

};


?>

<?php }; ?>