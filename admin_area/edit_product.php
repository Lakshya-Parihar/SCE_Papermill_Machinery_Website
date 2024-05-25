<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_product'])){

$edit_id = $_GET['edit_product'];

$get_p = "SELECT * FROM product WHERE id= '$edit_id'";

$run_edit = mysqli_query($conn,$get_p);

$row_edit = mysqli_fetch_array($run_edit);

$p_id = $row_edit['id'];

$p_name = $row_edit['name'];

$cat = $row_edit['cat_id'];

$m_id = $row_edit['manufacturers_id'];

$p_image = $row_edit['image'];

$new_p_image = $row_edit['image'];

}

$get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturers_id = '$m_id'";

$run_manufacturer = mysqli_query($conn,$get_manufacturer);

$row_manfacturer = mysqli_fetch_array($run_manufacturer);

$manufacturer_id = $row_manfacturer['manufacturers_id'];

$manufacturer_name = $row_manfacturer['manufacturers_name'];


$get_cat = "SELECT * FROM categories WHERE cat_id = '$cat'";

$run_cat = mysqli_query($conn,$get_cat);

$row_cat = mysqli_fetch_array($run_cat);

$cat_name = $row_cat['cat_name'];

?>


<!DOCTYPE html>

<html>

<head>

<title> Edit Products </title>


</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit Products

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Products

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Title </label>

<div class="col-md-6" >

<input type="text" name="name" class="form-control" required value="<?php echo $p_name; ?>">

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Select A Manufacturer </label>

<div class="col-md-6" >

<select name="manufacturer" class="form-control">

<option value="<?php echo $manufacturer_id; ?>">
<?php echo $manufacturer_name; ?>
</option>

<?php

$get_manufacturer = "SELECT * FROM manufacturers";

$run_manufacturer = mysqli_query($conn,$get_manufacturer);

while($row_manfacturer = mysqli_fetch_array($run_manufacturer)){

$manufacturer_id = $row_manfacturer['manufacturers_id'];

$manufacturer_name = $row_manfacturer['manufacturers_name'];

echo "
<option value='$manufacturer_id'>
$manufacturer_title
</option>
";

}

?>

</select>

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Category </label>

<div class="col-md-6" >


<select name="cat" class="form-control" >

<option value="<?php echo $cat; ?>" > <?php echo $cat_name; ?> </option>

<?php

$get_cat = "SELECT * FROM categories";

$run_cat = mysqli_query($conn,$get_cat);

while ($row_cat=mysqli_fetch_array($run_cat)) {

$cat_id = $row_cat['cat_id'];

$cat_name = $row_cat['cat_name'];

echo "<option value='$cat_id'>$cat_name</option>";

}

?>


</select>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Image </label>

<div class="col-md-6" >

<input type="file" name="product_img" class="form-control" >
<br><img src="product_images/<?php echo $p_image; ?>" width="70" height="70" >

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="update" value="Update Product" class="btn btn-primary form-control" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['update'])){

$product_name = $_POST['name'];
$cat = $_POST['cat'];
$manufacturer_id = $_POST['manufacturer'];

$product_img = $_FILES['product_img']['name'];

$temp_name = $_FILES['product_img']['tmp_name'];

if(empty($product_img)){

$product_img = $new_p_image;

}

move_uploaded_file($temp_name,"product_images/$product_img");

$update_product = "UPDATE product SET cat_id='$cat',manufacturers_id='$manufacturer_id',name='$product_name',image='$product_img',date_created =NOW() where id = '$p_id'";

$run_product = mysqli_query($conn,$update_product);

if($run_product){

echo "<script> alert('Product has been updated successfully') </script>";

echo "<script>window.open('index.php?view_products','_self')</script>";

}

}

?>

<?php } ?>
