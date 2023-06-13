<?php
    try
    {
        if(isset($_POST ['update_cat']))
        {
            include_once 'connect.php';
            $c = new Connect();
            $dblink = $c->connecToPDO();
            $sql = "UPDATE category SET `catName`= ? WHERE pcat_id = ?";
            $cat_id = $_POST['cat_id'];
            $cat_name = $_POST['cat_Name'];
            $re = $dblink->prepare($sql);
            $stmt = $re->execute(array($cat_name, $cat_id));
            if($stmt)
            {
                header ("location: show.php");
            }
            else
            {
                echo "Failed";
            }
        }
    }
    catch(Exception $e)
    {
        echo "Failed";
        echo '<script>alert("Tag has exist!")</script>';
        header ("location: show.php");
    }
?>