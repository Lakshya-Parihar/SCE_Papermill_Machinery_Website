<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<!-- <h1 class="page-header">Dashboard</h1> -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-primary"><!-- panel panel-primary Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-tasks fa-5x"> </i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge"> <?php echo $count_products; ?> </div>

<div>Products</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?view_products">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Details </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-primary Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->


<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-green"><!-- panel panel-green Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-comments fa-5x"> </i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge"> <?php echo $count_customers; ?> </div>

<div>Customers</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?view_customers">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Details </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-green Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->


<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-red"><!-- panel panel-red Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-support fa-5x"> </i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge"> <?php echo $count_total_requests; ?> </div>

<div>Requests</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?view_requests">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Details </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-red Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->






        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

            <div class="panel panel-warning"><!-- panel panel-red Starts -->
            
            <div class="panel-heading"><!-- panel-heading Starts -->
            
            <div class="row"><!-- panel-heading row Starts -->
            
            <div class="col-xs-3"><!-- col-xs-3 Starts -->
            
            <i class="fa fa-spinner fa-5x"> </i>
            
            </div><!-- col-xs-3 Ends -->
            
            <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->
            
            <div class="huge"> <?php echo $count_total_manufacturers ?> </div>
            
            <div>Manufacturers</div>
            
            </div><!-- col-xs-9 text-right Ends -->
            
            </div><!-- panel-heading row Ends -->
            
            </div><!-- panel-heading Ends -->
            
            <a href="index.php?view_manufacturers">
            
            <div class="panel-footer"><!-- panel-footer Starts -->
            
            <span class="pull-left"> View Details </span>
            
            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
            
            <div class="clearfix"></div>
            
            </div><!-- panel-footer Ends -->
            
            </a>
            
            </div><!-- panel panel-red Ends -->
            
            </div><!-- col-lg-3 col-md-6 Ends -->



            <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

                <div class="panel panel-info"><!-- panel panel-red Starts -->
                
                <div class="panel-heading"><!-- panel-heading Starts -->
                
                <div class="row"><!-- panel-heading row Starts -->
                
                <div class="col-xs-3"><!-- col-xs-3 Starts -->
                
                <i class="fa fa-check fa-5x"> </i>
                
                </div><!-- col-xs-3 Ends -->
                
                <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->
                
                <div class="huge"> <?php echo $count_total_categories ?> </div>
                
                <div>Categories</div>
                
                </div><!-- col-xs-9 text-right Ends -->
                
                </div><!-- panel-heading row Ends -->
                
                </div><!-- panel-heading Ends -->
                
                <a href="index.php?view_cats">
                
                <div class="panel-footer"><!-- panel-footer Starts -->
                
                <span class="pull-left"> View Details </span>
                
                <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                
                <div class="clearfix"></div>
                
                </div><!-- panel-footer Ends -->
                
                </a>
                
                </div><!-- panel panel-red Ends -->
                
                </div><!-- col-lg-3 col-md-6 Ends -->

</div><!-- 2 row Ends -->


<?php } ?>