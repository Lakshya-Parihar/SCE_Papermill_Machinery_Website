<?php

if (!isset($_SESSION['admin_email'])) {

  echo "<script>window.open('login.php','_self')</script>";
} else {

?>
  <!DOCTYPE html>

  <html>

  <head>

    <title> Insert Products </title>


  </head>

  <body>

    <div class="row"><!-- row Starts -->

      <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

          <li class="active">

            <i class="fa fa-dashboard"> </i> Dashboard / Insert Products

          </li>

        </ol><!-- breadcrumb Ends -->

      </div><!-- col-lg-12 Ends -->

    </div><!-- row Ends -->


    <div class="row"><!-- 2 row Starts -->

      <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <div class="panel panel-default"><!-- panel panel-default Starts -->

          <div class="panel-heading"><!-- panel-heading Starts -->

            <h3 class="panel-title">

              <i class="fa fa-money fa-fw"></i> Insert Products

            </h3>

          </div><!-- panel-heading Ends -->

          <div class="panel-body"><!-- panel-body Starts -->

            <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Name </label>

                <div class="col-md-6">

                  <input type="text" name="product_name" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->


              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Select A Manufacturer </label>

                <div class="col-md-6">

                  <select class="form-control" name="manufacturer"><!-- select manufacturer Starts -->

                    <option> Select A Manufacturer </option>

                    <?php

                    $get_manufacturer = "SELECT * FROM manufacturers";
                    $run_manufacturer = mysqli_query($conn, $get_manufacturer);
                    while ($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
                      $manufacturer_id = $row_manufacturer['manufacturers_id'];
                      $manufacturer_name = $row_manufacturer['manufacturers_name'];

                      echo "<option value='$manufacturer_id'>$manufacturer_name</option>";
                    }

                    ?>

                  </select><!-- select manufacturer Ends -->

                </div>

              </div><!-- form-group Ends -->


              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Category </label>

                <div class="col-md-6">


                  <select name="cat" class="form-control">

                    <option> Select a Category </option>

                    <?php

                    $get_cat = "SELECT * FROM categories";

                    $run_cat = mysqli_query($conn, $get_cat);

                    while ($row_cat = mysqli_fetch_array($run_cat)) {

                      $cat_id = $row_cat['cat_id'];

                      $cat_name = $row_cat['cat_name'];

                      echo "<option value='$cat_id'>$cat_name</option>";
                    }

                    ?>


                  </select>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Image </label>

                <div class="col-md-6">

                  <input type="file" name="product_img" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->




              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"></label>

                <div class="col-md-6">

                  <input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">

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

  if (isset($_POST['submit'])) {

    $product_name = $_POST['product_name'];
    $cat = $_POST['cat'];

    $manufacturer_id = $_POST['manufacturer'];

    $product_img = $_FILES['product_img']['name'];

    $temp_name = $_FILES['product_img']['tmp_name'];

    move_uploaded_file($temp_name, "product_images/$product_img");

    $insert_product = "INSERT into product (cat_id,manufacturers_id,name,image,date_created) values ('$cat','$manufacturer_id','$product_name','$product_img',NOW())";

    $run_product = mysqli_query($conn, $insert_product);

    if ($run_product) {

      echo "<script>window.open('index.php?view_products','_self')</script>";
    }
  }

  ?>

<?php } ?>