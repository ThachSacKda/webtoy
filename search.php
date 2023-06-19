<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>SKD SHOP</title>
</head>
<div class="row">

    <?php
    include_once 'header.php';
    include_once 'connect.php';


    $c = new Connect();
    $dblink = $c->connecToPDO();
    $nameP = $_GET['search'];
    $sql = "SELECT * FROM product where pname LIKE ?";
    $re = $dblink->prepare($sql);
    $re->execute(array("%$nameP%"));
    $rows = $re->fetchAll(PDO::FETCH_BOTH);
    foreach ($rows as $r) :
    ?>
        <div class="col-md-4 pb-3">
            <div class="card">
                <img src="image/<?= $r['pimage'] ?>" class="card-img-top" alt="Product1>" style="margin: auto;
        height: 360px;" />
                <div class="card-body">
                    <a href="detail.php?id=<?= $r['pid'] ?>" class="text-decoration-none">
                        <h5 class="card-title">
                            <?= $r['pname'] ?></h5>
                    </a>
                    <h5 class="card-subtitle mb-2 text-muted"><span>&#8363;</span><?= $r['pprice'] ?></h5>
                    <form action="cart.php" method="GET" id="addToCart" type="submit">
                        <input type="hidden" name="prod_id" value="<?= $r['pid'] ?>">
                        <input type="number" class="form-control" id="quantity" name="quantity" value="1" 
                        placeholder="Quantity" min="1">
                        <button type="submit" class="btn btn-primary" id="btn-cart" name="btn-add">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    endforeach;
    ?>
</div>

<?php
include_once 'footer.php'
?>

</html>