<?php
include_once 'header.php';
include_once 'connect.php';
?>
<?php
if(isset($_POST['btnRegister'])){
 $c = new connect();
    $dblink = $c->connecToPDO();
    $uname = $_POST['txtUsername'];
    $upassword = $_POST['txtPass1'];
    $uemail = $_POST['txtEmail'];
    $uphone = $_POST['txtPhone'];
    $ugender = $_POST['grpGender'];
    $udateBirth = date('Y-M-D', strtotime($_POST['txtBirth']));
    
    $sql = "INSERT INTO `user`(`uname`, `upassword`, `uemail`, `uphone`, `ugender`, `udateBirth`) VALUES (?,?,?,?,?,?)";
    $re = $dblink->prepare($sql);
    $stmt= $re->execute(array("$uname","$upassword","$uemail","$uphone","ugender","$udateBirth"));

}
?>
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
    <title>Register-SKD Shop</title>
</head>
<style>
    .dropdown:hover .dropdown-menu{
    display: block;
    }
    .form-check{
        color: white;
    }
    .form-group{
        color: white;

    }
</style>

<body>
    
    <div id="wrapper">
        
        <form action="" id="form-login" name="form-login" method="post" action="" class="form-horizontal needs-validation" role="form">
        <h1 class="registration">REGISTRATION</h1>
        
        <div class="form-group">    
            
            <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value="" required/>
        </div>

        <div class="form-group">
            
            <input type="password" name="txtPass1" id="txtPass1" class="form-control" placeholder="Password" required/>
        </div>

        <div class="form-group">
        <input type="password" name="txtPass2" id="txtPass2" class="form-control" placeholder="Password" required/>
        </div>

        <div class="form-group">
        <input type="text" name="txtPass2" id="txtFullname" class="form-control" placeholder="Fullname" required/>
        </div>

        <div class="form-group">
            <input type="text" name="txtEmail" id="txtEmail" value="" class="form-control" placeholder="Email" required/>
        </div>

        <div class="form-group">
            <input type="text" name="txtPhone" id="txtPhone" value="" class="form-control" placeholder="Phone" required/>
        </div>

        <div class="form-group">  
                    <label for="lblGender" class="col-sm-2 control-label">Gender:  </label>
                    <div class="col-sm-10">                              
                        <div class="form-check">
                            <label class="radio-inline"><input type="radio" name="grpGender" value="0" id="grpRender"  class="form-check-input"/>
                            Male</label>
                        </div>
                        <div class="form-check">
                            <label class="radio-inline"><input type="radio" name="grpGender" value="1" id="grpRender" class="form-check-input"/>
                            
                            Female</label>
                        </div>

                    </div>
        </div>

        <div class="form-group"> 
                        <label for="lblNgaySinh" class="col-sm-2 control-label">Date:</label>
                        <div class="col-sm-10">
                            <input type="date" id="txtBirth" name="txtBirth" class="form-control">
                           
                       </div>
        </div>	

            <input type="submit"  class="btn btn-primary" name="btnRegister" id="btnRegister" value="Register"/>
        </form>
    </div>

    
</body>
</html>