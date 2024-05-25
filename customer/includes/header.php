<?php

session_start();

include("../config/dbcon.php");


$login = $_SESSION['user_id'];
if($login == true){

}
else{
    header( "Location: ../login.php"); 
}

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCE!!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./styles/main.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    <style>
        
        .home{
            display: flex;
            align-items: center;
            min-height: 100vh;
            background-image: url("Images/bg_Main.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        a{
            text-decoration: none;
        }
        .icons{
            text-decoration: none;
        }
        .btns{
            text-decoration: none;
        }

        .btn-super-lg {
            padding: 15px 30px;
            width: 200px;
            font-size: 15px;
            transition: .1s;
            color: white;
            background-color: black;
            border-radius: 40px;
            cursor: pointer;
        }

        .btn-super-lg:hover {
            padding: 15px 30px;
            font-size: 15px;
            transition: .1s;
            background-color: #05f211cc;
            color: black;
        }

    </style>

</head>
<body>


<?php include('navbar.php'); ?>