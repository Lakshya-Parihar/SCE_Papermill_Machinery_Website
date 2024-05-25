<?php 

include('includes/header.php'); 
$user_id = $_SESSION['user_id'];

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];

    mysqli_query($conn, "DELETE FROM cart WHERE id = '$remove_id'") or die('query failed');
    header("Location: index.php");
};
 
?>

<section class="home" id="home">

<div class="content">
    <h3>Welcome to SCE!!</h3>
    <span> All New and Branded Papermill Machineries</span>
    <p>Are you tired of using old machineries & service parts? Look no further!
        <span style="color: #11ff00; font-size: 15px;">SCE!!</span> brings you the most modern and
        unique collection of machineries and spare parts.
    </p>
    <a href="#products" class="btncontent">Shop now</a>
</div>

</section>

<section class="about" id="about">

<h1 class="heading"> <span> About </span> Us </h1>

<div class="row">

    <div class="video-container">
        <video src="../Images/videobgabt.mp4" loop autoplay muted></video>
        <h3>Best Papermill Machineries</h3>
    </div>

    <div class="content">
        <h3>Why <span style="color: #1c59e998;"> choose </span> us?</h3>
        <p style="color: #000000;">Superior Quality</p>
        <p>We meticulously curate machineries and spare parts to guarantee unparalleled craftsmanship.</p>
        <p style="color: #000000;">Exclusive Designs</p>
        <p>We collaborate with elite fashion-forward designers just for you!</p>
        <p style="color: #000000;">Hassle-free Returns</p>
        <p>Customer satisfaction is our main priority. No fuss, no worries!</p>

        <a href="#" class="btncontent">Learn more</a>
    </div>

</div>

<section class="products" id="products">

<h1 class="heading"> Latest <span> Products </span> </h1>

<div class="box-container">

    <?php 
    
        $query = "SELECT * FROM product ORDER BY id ASC";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_array($result)) {
    ?>

                <div class="box">
                    <form action="cart.php" method="post">
                        <div class="image">
                            <img src="Images/<?php echo $row['image']; ?>" style="height: 300px; width: 300px;" class="card-img-top" alt="">
                        </div>
                        <div class="content">
                            <h3 class="content"><?php echo $row['name']; ?></h3>
                            <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                            <input type="hidden" name="image" value="<?php echo $row['image'];  ?>">
                            <input type="submit" name="enquire" value="ENQUIRE" class="btn-super-lg">
                        </div>
                    </form>
                </div>

                <?php
            }
        }

    ?>

</div>

</section>

<section class="faq" id="faq">

<h1 class="heading">Customer's <span>Queries</span> </h1>

<div class="box-container">

<div class="box">
        <h3>Do you have a physical store?</h3>
        <p>Yes we have a physical store and this website connects a 
            store with a customer to enquire about our product!!</p>
        <span class="fas fa-quote-right"></span>
    </div>

    <div class="box">
        <h3>What's your return policy?</h3>
        <p>As of now,No we do not accept returns!!</p>
        <span class="fas fa-quote-right"></span>
    </div>

    <div class="box">
        <h3>Do you offer international shipping?</h3>
        <p>No, We do not provide international shipping.</p>
        <span class="fas fa-quote-right"></span>
    </div>

</section>

<section class="contact" id="contact">

<h1 class="heading"> <span>Feedback</span></h1>

<div class="row">

    <form action="index.php" method="post">
        <input type="text" placeholder="name" name="name" class="box" required>
        <input type="email" placeholder="email" name="email" class="box" required>
        <input type="number" placeholder="mobile number" name="contact" class="box" required>
        <textarea name="message" class="box" placeholder="message" cols="30" rows="10" required></textarea>
        <input type="submit" name="submit" value="Send message" class="btnsubmit">
    </form>

</div>

</section>

<?php

if(isset($_POST['submit'])){
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $message = $_POST['message'];

    $feedback = "INSERT INTO feedback(user_id,name,email,contact,message) VALUES('$user_id','$name','$email','$contact','$message')";
    $feedback_run = mysqli_query($conn, $feedback);
    

}

?>

<?php include('includes/footer.php'); 


?>