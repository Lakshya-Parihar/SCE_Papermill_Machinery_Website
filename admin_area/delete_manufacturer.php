<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php

if(isset($_GET['delete_manufacturer'])){

$delete_id = $_GET['delete_manufacturer'];

$delete_manufacturer = "DELETE FROM manufacturers WHERE manufacturers_id = '$delete_id'";

$run_manufacturer = mysqli_query($conn,$delete_manufacturer);

if($run_manufacturer){

echo "<script>alert('One Manufacturer Has Been Deleted')</script>";
echo "<script>window.open('index.php?view_manufacturers','_self')</script>";

}

}


?>


<?php } ?>