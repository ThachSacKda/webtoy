<?php
session_start();
ob_start();
include_once 'connect.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

</head>
<style>
    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .search {
        display: flex;
        align-items: right;
        justify-content: right;
    }

    .searchbox {
        width: 400px;
        height: 35px;
        display: flex;
        align-items: right;
    }

    .searchbox button {
        width: 50px;
        height: 35px;
        background-color: #1d1a1a;
        color: #fff;
        border: none;
        outline: none;
        font-weight: bold;
        border-radius: 3px;
        transition: 0.4s;
    }

    .searchbox button:hover {
        background-color: rgb(195, 213, 248);
    }
</style>



<body>
    <nav class="navbar navbar-expand-md navbar-dark 
    bg-dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">Home </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="search">
                <form class="searchbox" action="search.php">
                    <input type="text" class="form-control" placeholder="Search..." name="search">
                    <button class="search_button" name="btnSearch"><i class="bi bi-search"></i></button>
                </form>
            </div>

        </div>
        <div class="collapse navbar-collapse" id="navbarMain">
            <div class="navbar-nav">
                <a href="index.php" class="nav-link active">Home</a>
                <a href="cart.php" class="nav-link">Cart</a>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Management
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="listofproduct.php">Product</a>
                        <a class="dropdown-item" href="show.php">Category</a>
                    </div>
                </div>
                <a href="./sortproduct.php" class="nav-link active">Category</a>
                <?php
                if (isset($_SESSION['user_name'])) :
                    // if(isset($_COOKIE['user_name'])):
                ?>
                    <a href="#" class="nav-item nav-link">Wellcome,<?= $_SESSION['user_name'] ?></a>
                    <a href="logout.php" class="nav-item nav-link">Logout</a>
                <?php
                else :
                ?>
                    <a href="#" class="nav-item nav-link" onclick="document.location='login.php'">Login</a>
                    <a href="#" class="nav-item nav-link" onclick="document.location='register.php'">Register</a>
                <?php
                endif;
                ?>
            </div>

        </div>
        </div>
    </nav>