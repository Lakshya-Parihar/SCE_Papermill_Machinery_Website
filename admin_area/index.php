<?php
session_start();

include("includes/dbcon.php");

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

    <?php

    $admin_session = $_SESSION['admin_email'];

    $get_admin = "SELECT * FROM admin WHERE admin_email = '$admin_session'";

    $run_admin = mysqli_query($conn, $get_admin);

    $row_admin = mysqli_fetch_array($run_admin);

    $admin_id = $row_admin['admin_id'];

    $admin_name = $row_admin['admin_name'];

    $admin_email = $row_admin['admin_email'];

    $admin_contact = $row_admin['admin_contact'];



    $get_products = "SELECT * FROM product";
    $run_products = mysqli_query($conn, $get_products);
    $count_products = mysqli_num_rows($run_products);

    $get_customers = "SELECT * FROM users";
    $run_customers = mysqli_query($conn, $get_customers);
    $count_customers = mysqli_num_rows($run_customers);

    $get_total_requests = "SELECT * FROM requests";
    $run_total_requests = mysqli_query($conn, $get_total_requests);
    $count_total_requests = mysqli_num_rows($run_total_requests);

    $get_total_manufacturers = "SELECT * FROM manufacturers";
    $run_total_manufacturers = mysqli_query($conn, $get_total_manufacturers);
    $count_total_manufacturers = mysqli_num_rows($run_total_manufacturers);

    $get_total_categories = "SELECT * FROM categories";
    $run_total_categories = mysqli_query($conn, $get_total_categories);
    $count_total_categories = mysqli_num_rows($run_total_categories);


    $get_pending_requests = "SELECT * FROM requests WHERE status='pending'";
    $run_pending_requests = mysqli_query($conn, $get_pending_requests);
    $count_pending_requests = mysqli_num_rows($run_pending_requests);

    $get_completed_requests = "SELECT * FROM requests WHERE status='completed'";
    $run_completed_requests = mysqli_query($conn, $get_completed_requests);
    $count_completed_requests = mysqli_num_rows($run_completed_requests);

    ?>


    <!DOCTYPE html>
    <html>

    <head>

        <title>Admin Panel</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet">

        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    </head>

    <body>

        <div id="wrapper"><!-- wrapper Starts -->

            <?php include("includes/sidebar.php");  ?>

            <div id="page-wrapper"><!-- page-wrapper Starts -->

                <div class="container-fluid"><!-- container-fluid Starts -->

                    <?php

                    if (isset($_GET['dashboard'])) {

                        include("dashboard.php");
                    }

                    if (isset($_GET['insert_product'])) {

                        include("insert_product.php");
                    }

                    if (isset($_GET['view_products'])) {

                        include("view_products.php");
                    }

                    if (isset($_GET['delete_product'])) {

                        include("delete_product.php");
                    }

                    if (isset($_GET['edit_product'])) {

                        include("edit_product.php");
                    }


                    if (isset($_GET['insert_cat'])) {

                        include("insert_cat.php");
                    }

                    if (isset($_GET['view_cats'])) {

                        include("view_cats.php");
                    }

                    if (isset($_GET['delete_cat'])) {

                        include("delete_cat.php");
                    }

                    if (isset($_GET['edit_cat'])) {

                        include("edit_cat.php");
                    }

                    if (isset($_GET['view_customers'])) {

                        include("view_customers.php");
                    }

                    if (isset($_GET['customer_delete'])) {

                        include("customer_delete.php");
                    }


                    if (isset($_GET['view_requests'])) {

                        include("view_requests.php");
                    }

                    if (isset($_GET['request_delete'])) {

                        include("request_delete.php");
                    }

                    if (isset($_GET['insert_user'])) {

                        include("insert_user.php");
                    }

                    if (isset($_GET['view_users'])) {

                        include("view_users.php");
                    }


                    if (isset($_GET['user_delete'])) {

                        include("user_delete.php");
                    }

                    if (isset($_GET['user_profile'])) {

                        include("user_profile.php");
                    }

                    if (isset($_GET['insert_manufacturer'])) {

                        include("insert_manufacturer.php");
                    }

                    if (isset($_GET['view_manufacturers'])) {

                        include("view_manufacturers.php");
                    }

                    if (isset($_GET['delete_manufacturer'])) {

                        include("delete_manufacturer.php");
                    }

                    if (isset($_GET['edit_manufacturer'])) {

                        include("edit_manufacturer.php");
                    }

                    if (isset($_GET['edit_contact_us'])) {

                        include("edit_contact_us.php");
                    }

                    ?>

                </div><!-- container-fluid Ends -->

            </div><!-- page-wrapper Ends -->

        </div><!-- wrapper Ends -->

        <script src="js/jquery.min.js"></script>

        <script src="js/bootstrap.min.js"></script>


    </body>


    </html>

<?php } ?>