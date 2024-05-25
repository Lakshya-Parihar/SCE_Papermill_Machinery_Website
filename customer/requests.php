<?php


include("../config/dbcon.php");
include('includes/header.php'); 



$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
header("Location: ../login.php");
};

if(isset($_POST["request"])) {

    $username = $_POST['username'];
    $usercontact = $_POST['contact'];
    $useremail = $_POST['email'];
    $product_id = $_POST['product_id'];

    $cart_query = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'");
    if(mysqli_num_rows($cart_query) > 0){
        while($product_item= mysqli_fetch_assoc($cart_query)){
            $product_name[] = $product_item['name'];
        };
    };

    $productname = implode(', ', $product_name);

    $duplicate = mysqli_query($conn, "SELECT * FROM requests WHERE user_id = '$user_id' AND product_name = '$productname'");
    if(mysqli_num_rows($duplicate)  > 0){
        echo "<script>alert('Request already submitted!')</script>";
    echo "<script>window.location.href = 'index.php'</script>";

    }else{

    mysqli_query($conn,"INSERT INTO requests(user_id,user_name,contact,user_email,product_name,status) VALUES ('$user_id','$username','$usercontact','$useremail','$productname','Pending')");


    echo "<script>alert('Your Request has been submitted');</script>";
    echo "<script>window.location.href = 'index.php'</script>";

    };

};


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/requests.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Cart</title>

    <style>
        a{
            text-decoration: none;
        }
        .icons{
            text-decoration: none;
        }
        .btns{
            text-decoration: none;
        }

    </style>

</head>
<body>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="container">

    <section class="checkout-form">

    <h1 class="heading">Enter Details To Request a Call</h1>

        <form action="" method="post">

            <div class="display_order">
                <?php 
                
                $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'");
                if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){


                ?>

                <span><?= $fetch_cart['name']; ?></span>

                <?php
                    }
                        }else{
                            echo "<div class='display_order'><span>your cart is empty!</span></div>";
                        };
                ?>
            </div>

            <div class="flex">
                <div class="inputBox">
                    <span>Your Name</span>
                    <input type="text" placeholder="Enter your name" name="username" required>
                </div>
                <div class="inputBox">
                    <span>Your Number</span>
                    <input type="text" placeholder="Enter your number" name="contact" required>
                </div>
                <div class="inputBox">
                    <span>Your Email</span>
                    <input type="email" placeholder="Enter your email" name="email" required>
                </div>
            </div>
            <center><input type="submit" value="Submit" name="request" class="btn-super-lg" style="margin-top: 10px;"></center>
        </form>

    </section>

</div>


<?php include('includes/footer.php'); ?>
</body>
</html>