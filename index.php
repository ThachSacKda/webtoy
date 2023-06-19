<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Home-ATN</title>
</head>


<h1 class=" d-flex justify-content-center align-items-center">ATN SHOP</h1>


<banner>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./image/banner3.jpg" class="d-block w-100" alt="..." width="500px" height="600px">
            </div>
        </div>
    </div>
</banner>


<body>
    <h2 class="row height d-flex justify-content-center align-items-center">All product</h2>
    <style>
        .main-header {
            text-align: center;
        }

        .h1 {
            color: red;
        }
    </style>

    <div class="row">
        <?php
        include_once 'connect.php';
        $c = new connect();
        $dblink = $c->connectToMySQL();
        $sql = "SELECT *FROM product";
        $re = $dblink->query($sql);
        if ($re->num_rows > 0) :
            while ($row = $re->fetch_assoc()) :
        ?>
                <div class="col-md-4 pb-3">
                    <div class="card">
                        <img src="image/<?= $row['pimage'] ?>" class="card-img-top" alt="Product1>" style="margin: auto; height: 360px;" />
                        <div class="card-body">
                            <a href="detail.php?id=<?= $row['pid'] ?>" class="text-decoration-none">
                                <h5 class="card-title">
                                    <?= $row['pname'] ?>
                                </h5>
                            </a>
                            <h6 class="card-subtitle mb-2 text-muted"><span>&#8363;</span> <?= $row['pprice'] ?></h6>
                            <!-- <button  class="btn btn-primary" action="cart.php">Add to Cart></button>  -->
                            <form action="cart.php" method="GET" id="addToCart" type="submit">
                                <input type="hidden" name="prod_id" value="<?= $row['pid'] ?>">
                                <input type="number" class="form-control" id="quantity" name="quantity" value="1" placeholder="Quantity" min="1" max="<?= $row['pquantity'] ?>">

                                <button type="submit" class="btn btn-primary" id="btn-cart" name="btn-add">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
        else :
            echo "Not found";
        endif;
        ?>
    </div>
    <?php
    require_once 'footer.php'
    ?>

</body>

</html>