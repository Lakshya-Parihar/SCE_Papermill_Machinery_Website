<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts  --->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Requests

</li>

</ol><!-- breadcrumb Ends  --->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> View Requests

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>#</th>
<th>Customer</th>
<th>Product</th>
<th>Request Date</th>
<th>Status</th>
<th>Action</th>


</tr>

</thead><!-- thead Ends -->


<tbody><!-- tbody Starts -->

<?php

$i = 0;

$get_requests = "SELECT * from requests";

$run_requests = mysqli_query($conn,$get_requests);

while ($row_requests = mysqli_fetch_array($run_requests)) {

$request_id = $row_requests['id'];

$customer_name = $row_requests['user_name'];

$request_status = $row_requests['status'];

$run_products = mysqli_query($conn,$get_products);

$row_products = mysqli_fetch_array($run_products);

$product_name = $row_requests['product_name'];

$i++;

?>

<tr>

<td><?php echo $i; ?></td>

<td>
<?php 

echo $customer_name;

 ?>
 </td>


<td>
    <?php echo $product_name; ?>
</td>

<td>
<?php

$get_customer_request = "SELECT * FROM requests WHERE id = '$request_id'";

$run_customer_request = mysqli_query($conn,$get_customer_request);

$row_customer_request = mysqli_fetch_array($run_customer_request);

$request_date = $row_customer_request['request_date'];

echo $request_date;

?>
</td>

<td>
<?php

// if($request_status=='pending'){

// echo $request_status='<div style="color:red;">Pending</div>';

// }
// else{

// echo $request_status='completed';

// }

echo $request_status;


?>
</td>

<td>

<a href="index.php?request_delete=<?php echo $request_id; ?>" >

<i class="fa fa-trash-o" ></i> Delete

</a>

</td>


</tr>

<?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php } ?>