<?php
include("../config/dbcon.php");
include('includes/header.php'); 



$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
header("Location: ../login.php");
}

if(isset($_POST["enquire"])){
    $name = $_POST['name'];
    $image = $_POST['image'];

    $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($select_cart) > 0){
        echo "<script>alert('Product already in the Enquiry List!');</script>";
    }
    else{
        mysqli_query($conn, "INSERT INTO cart(user_id,name,image) VALUES ('$user_id', '$name','$image')") or die('query failed');
        echo "<script>alert('Product added to Enquiry List');</script>";
    }

};



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
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
    <div class="row mt-5" >
        <div class="col-lg-12 text-center rounded" style="margin-top: 60px; margin-bottom: 20px;">
        <h1 class="heading">Enquiry Cart</h1>
        </div>
    </div>

    <div class="col-lg-12">

        <table class="table" style="font-size: 20px; border:1px solid black; ">
            <thead class="text-center">
                <tr>
                    <th scope="col" style="color: white; background-color:black;">Sr. No.</th>
                    <th scope="col" style="color: white; background-color:black;">Image</th>
                    <th scope="col" style="color: white; background-color:black;">Name</th>
                    <th scope="col" style="color: white; background-color:black;">Action</th>
                </tr>
            </thead>
        <tbody class="text-center">
        <?php 
            $sr = 1;
                $select_cart = "SELECT * FROM cart WHERE user_id = '$user_id'";
                $result = mysqli_query($conn,$select_cart);
                
                if(mysqli_num_rows($result) == 0) {
                    echo "<script>alert('Your Cart is Empty!!');</script>";
                    echo "<script>window.location.href = 'index.php'</script>";
                }

                elseif(mysqli_num_rows($result) > 0) {

                    while($fetch_cart = mysqli_fetch_array($result)) {
            ?>

                <tr>
                    <td><?php echo $sr; ?></td>
                    <td><img src="Images/<?php echo $fetch_cart['image']; ?>" height="100" width="100" alt=""></td>
                    <td><?php echo $fetch_cart['name']; ?></td>
                    <td>
                        <a href="index.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Do you want to remove this item?');"><input type="submit" class="btn btn-warning" value="Remove"></a>
                    </td>
                </tr>

            <?php
                $sr++;
                    };
                };
                
            ?>
        </tbody>
        </table>
        

        <form action="requests.php" method="post">
            <center><button type="submit" class="btn-super-lg" style="width: 200px; font-size: 18px; margin-bottom: 50px; margin-top: 50px;">Request a Call</button></center>
        </form>


    </div>

</div>


<?php include('includes/footer.php'); ?>
</body>
</html>