<?php


    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "sce_new";

    $conn = mysqli_connect($servername,$username,$password,$database);
    if(!$conn)
    {
        echo'connection failed';
    }  
?>