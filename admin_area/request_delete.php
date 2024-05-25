<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['request_delete'])){

$delete_id = $_GET['request_delete'];

$delete_order = "DELETE FROM requests WHERE id = '$delete_id'";

$run_delete = mysqli_query($conn,$delete_order);

if($run_delete){

echo "<script>alert('Request Has Been Deleted')</script>";

echo "<script>window.open('index.php?view_requests','_self')</script>";


}


}



?>



<?php }  ?>