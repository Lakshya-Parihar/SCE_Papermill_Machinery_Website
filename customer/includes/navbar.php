<?php


$login = $_SESSION['user_id'];
if($login == true){

}
else{
    header( "Location: ../login.php"); 
}
?>





<link type="text/css" href="styles/main.css">
<link type="text/css" href="styles/products_index.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <header>

        <input type="checkbox" name="toggler" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="index.php" class="logo">SCE<span>!!</span></a>

        <nav class="navbar">
            <a href="index.php#home">HOME</a>
            <a href="index.php#about">ABOUT</a>
            <a href="index.php#products">PRODUCTS</a>
            <a href="index.php#faq">FAQ</a>
 
            <a href="index.php#contact">CONTACT</a>
        </nav>

        <div class="icons">
            <a href="requests.php" class="fas fa-check"></a>
            <a href="cart.php" class="fas fa-shopping-cart"></a>
            <a href="user-profile.php" class="fas fa-user"></a>
        </div>
        <?php 
        
        ?>
        <div class="btns">
        <a href="../logout.php" class="btncontent" onclick="return confirm('Are you Sure you want to Log out!!');">Logout</a>&nbsp;&nbsp;
        </div>

    </header>
