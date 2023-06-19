<?php
include_once 'connect.php';
session_start();
if (isset($_POST['btnLogin'])) {
    if (isset($_POST['txtpass1']) && isset($_POST['txtUsername'])) {
        $pwd = $_POST['txtpass1'];
        $usr = $_POST['txtUsername'];
        $c = new connect();
        $dblink = $c->connecToPDO();
        $sql = "select * from user where uname = ? and upassword = ?";
        $stmt = $dblink->prepare($sql);
        $re = $stmt->execute(array("$usr", "$pwd"));
        $numrow = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_BOTH);
        if ($numrow == 1) {
            echo "Login successfully";
            $_SESSION['user_name'] = $row['uname'];
            $_SESSION['user_id'] = $row['uid'];
            header("Location: index.php");
        } else {
            echo "Something wrong with your info<br>";
        }
    } else {
        echo "Please enter your info";
    }
}
?>
<style>
    #wrapper {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #frmLogin {
        background-color: black;
        border: 1px solid #f5f5f5;
        color: #f5f5f5;
        width: 100%;
        text-transform: uppercase;
        padding: 6px 10px;
        transition: 0.25 ease-in-out;
        margin-top: 30px;

    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./register.css" class="css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>LOGIN-SKD SHOP</title>
</head>
<style>
    .dropdown:hover .dropdown-menu {
        display: block;
    }
</style>



<div id="wrapper">
    <div class="container">

        <form id="frmLogin" name="frmRegister" action="login.php" method="POST" role="form" onsubmit="return formValid();">
            <h1 class="form-heading">
                <center>Login</center>
            </h1>
            <div class="row pb-3">

                <label for="txtTen" class="col-sm-3 control-label"></label>
                <div class="col-sm-8">
                    <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value="" required />

                </div>
            </div>
            <div class="row pb-4">
                <label class="col-sm-3 col-form-label" for="password1"></label>
                <div class="col-sm-8">
                    <input type="password" name="txtpass1" id="password1" class="form-control" placeholder="Password" required>
                </div>
            </div>
            <div class="row pb-3">
                <div class="d-grid col-2 mx-auto">
                    <input type="submit" value="Login" class="btn btn-primary" name="btnLogin" id="btnLogin">

                </div>
            </div>
            <div class="form-Back" style="justify-content: space-between; display:flex">
                <a href="register.php" class="nav-link" onclick="document.location ='register.php'">Create Account</a>
            </div>
        </form>
    </div>
    </body>