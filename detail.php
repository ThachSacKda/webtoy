<?php
require_once 'header.php';
include_once 'connect.php';
?>
<style>

  .col-sm-6{
    margin: auto;
    padding: auto;
    color: black;

  }
  .btn-primary{
    margin: 25px;
  }
</style>
<article>
<div class="row pb-3">
    <?php
 
    $c=new connect();
    $dblink = $c->connectToMySQL();
    $pid= $_GET['id'];
    $sql = "select * from product WHERE pid ='$pid'";
    $re = $dblink->query($sql);
    $r = $re->fetch_assoc();
    ?>
            <img src="./image/<?= $r['pimage']?>" class="col-sm-6 col-form-label" width="50px" height="750px">
            <div class="col-sm-6">
                <h1><?= $r['pname']?></h1>
                <p><?= $r['pdescription']?></p>
                <p>The remaining amount: <?=$r['pquantity']?></p>
                <p><span><i class="bi bi-currency-dollar"></i></span><?=$r['pprice']?></p>
                <div class="quantity" style"padding-bottom:20px;">
                    <form action="cart.php" method="GET" id="addToCart" type="submit">
                                <input type="hidden" name="prod_id" value="<?= $r['pid'] ?>">
                                <input type="number" class="form-control" id="quantity" name="quantity" value="1" placeholder="Quantity" min="1">
                                <button type="submit" class="btn btn-primary" id="btn-cart" name="btn-add">Add to Cart</button>
                            </form>
                </div>
                
                
            </div>
            
                     
</div>
<hr>
</article>
<?php
require_once 'footer.php';
?>