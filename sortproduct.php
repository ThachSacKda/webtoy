<?php
require_once 'header.php';
?>
<style>
  body{
    
    background-size: cover;
    background-position-y: -100px;
  }
  .head{
    font-size: 60px;
    max-width: fit-content;
    color: red;
    margin: auto;
  }
  .cate-list a{
    padding: 12px;
    font-size: 30px;
    color: red;
    text-decoration: none;

  }
  .cate-list a:hover{
    color: aquamarine;
  }
  .card{
    background: white;
  }    
  
     </style>
<body >
    <div class="product-container">
        <nav  class="cate">
            <div class="head">All Product</div>
            <div class="cate-list">
                <?php
                include_once 'connect.php';
                $c = new connect();
                $dblink = $c->connectToMySQL();
                $sql = "SELECT DISTINCT c.pcat_id, c.catName FROM category c INNER JOIN product p
                ON c.pcat_id = p.pcat_id";
                $re = $dblink->query($sql);
                $row1 = $re->fetch_row();
                $re->data_seek(0);
                while ($row = $re->fetch_assoc()) {
                    $href ="?pcat_id=$row[pcat_id]";
                    echo "<a href='$href'>$row[catName]</a>";
                }
                ?>
            </div>
              
        </nav>
      <br>
        <div class="row" >

            <?php
                include_once 'connect.php';
                $c = new connect();
                $dblink = $c->connectToMySQL();
                $idcat = $_GET['pcat_id'] ?? '';
                $sql = "SELECT * FROM product WHERE pcat_id ='$idcat'";
                $re = $dblink->query($sql);
                $row1 = $re->fetch_row();;
                $re->data_seek(0);
                if ($re->num_rows > 0) :
                    while ($row = $re->fetch_assoc()) :
                ?>
                     <div class="col-md-4 pb-3">
             <div class="card">
                 <img
                 src="./image/<?=$row['pimage']?>"
                 class="card-img-top"
                 alt="Product1>" style="margin: auto; height: 300px;"
                 />
                 <div class="card-body">
                 <a href="detail.php?id=<?=$row['pid']?>" class="text-decoration-none"><h5 class="card-title"><?=$row['pname']?></h5></a>
                 <h6 class="card-subtitle mb-2 text-muted"><span><i class="bi bi-currency-dollar"></i></span><?=$row['pprice']?></h6>
                 <a href="#" class="btn btn-primary">Add to Cart</a>
                 </div>
             </div>
     </div>                                       
                <?php
                    endwhile;
                else :
                    include_once 'connect.php';
                    $c = new connect();
                    $dblink = $c->connectToMySQL();
                    $sql = "SELECT *FROM product ";
                    $re = $dblink->query($sql);
                    $row1 = $re->fetch_row();;
$re->data_seek(0);
                    if ($re->num_rows > 0) :
                        while ($row = $re->fetch_assoc()) :
                    ?>
                         <div class="col-md-4 pb-3">
             <div class="card">
                 <img
                 src="./image/<?=$row['pimage']?>"
                 class="card-img-top"
                 alt="Product1>" style="margin: auto; width: 300px; height: 250px;"
                 />
                 <div class="card-body">
                 <a href="detail.php?id=<?=$row['pid']?>" class="text-decoration-none"><h5 class="card-title"><?=$row['pname']?></h5></a>
                 <h6 class="card-subtitle mb-2 text-muted"><span><i class="bi bi-currency-dollar"></i></span><?=$row['pprice']?></h6>
                 <form action="cart.php" method="GET" id="addToCart" type="submit">
                                <input type="hidden" name="prod_id" value="<?= $row['pid'] ?>">
                  </form>
                            
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
                endif;
            endif;
                ?>
     </div>
        

    </div>

</body>

</html>                               
<?php
require_once 'footer.php';
?>
