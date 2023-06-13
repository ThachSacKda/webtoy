<?php
    include_once 'header.php'
?>
   <div class="row">
            <?php
            include_once 'connect.php';
            $c = new connect();
            $dblink =$c->connectToMySQL();
            $sql="SELECT *FROM product";
            $re = $dblink->query($sql);
            if($re->num_rows>0):
                while($row=$re->fetch_assoc()):
            ?>
            <div class="col-md-4 pb-3">
                    <div class="card">
                        <img
                        src="image/<?=$row['pimage']?>"
                        class="card-img-top"
                        alt="Product1>" style="margin: auto; height: 360px;"
                        />
                        <div class="card-body">
                        <a href="detail.php?id=<?=$row['pid']?>" class="text-decoration-none"><h5 class="card-title">
                            <?=$row['pname']?>
                        </h5></a>
                        <h6 class="card-subtitle mb-2 text-muted"><span>&#8363;</span> <?=$row['pprice']?></h6>
                        <!-- <button  class="btn btn-primary" action="cart.php">Add to Cart></button>  -->
                        <form action="cart.php" method="GET" id="addToCart" type="submit">
                                <input type="hidden" name="prod_id" value="<?= $row['pid'] ?>">
                                <input type="number" class="form-control" id="quantity" name="quantity" value="1" placeholder="Quantity" min="1">
                                <button type="submit" class="btn btn-primary" id="btn-cart" name="btn-add">Add to Cart</button>
                            </form>
                        </div>
                    </div>
            </div>
            <?php
                endwhile;
            else:
                echo "Not found";
            endif;
            ?>  
        </div>
<?php
    include_once 'footer.php'
?>