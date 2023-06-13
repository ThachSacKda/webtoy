<?php
ob_start();
include_once 'header.php';
?>
<?php

$total=0;
$c = new connect();
$dblink = $c->connecToPDO();
if (isset($_SESSION['user_id'])) {
    $user = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];

    if (isset($_GET['prod_id'])) {
        $prod_id = $_GET['prod_id'];
        $quantity = $_GET['quantity'];
        $sqlSelect1 = "SELECT cart_id FROM cart WHERE uid=? AND pid=?";
        $re = $dblink->prepare($sqlSelect1);
        $re->execute(array("$user_id", "$prod_id"));

        if ($re->rowCount() == 0) {
            $query = "INSERT INTO cart(`uid`, `pid`, `pCount`) VALUES (?,?,$quantity)";
        } else {
            $query = "UPDATE cart SET pCount = pCount + $quantity where uid=? and pid=?";
        }
        $stmt = $dblink->prepare($query);
        $stmt->execute(array("$user_id", "$prod_id"));
    }
    if (isset($_GET['del_id'])) {
        $cart_del = $_GET['del_id'];
        $query = "DELETE FROM cart WHERE cart_id=?";
        $stmt = $dblink->prepare($query);
        $stmt->execute(array($cart_del));
    }
    $sqlSelect = "SELECT * FROM cart c, product p where c.pid = p.pid and uid =?";
    $stmt1 = $dblink->prepare($sqlSelect);
    $stmt1->execute(array($user_id));
    $rows = $stmt1->fetchAll(PDO::FETCH_BOTH);
} else {
    header("location:login.php");
    ob_get_flush();
}
?>

<div class="container">
    <h1 class="fw-bold mb-0 text-black">Your Cart</h1>
    <h6 class="mb-0 text-muted"><?= $stmt1->rowCount() ?> item(s)</h6>
    <table class="table">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><?= $row['pname'] ?></td>
                <td><input id="from1" min="0" name="quantity" value="<?= $row['pCount'] ?>" type="number" class="form-control form-control-sm" /></td>
                <td>
                    <h6 class="mb-0"><?= $row['pCount'] ?> * <?= $row['pprice'] ?><span>&#8363</span></h6>
                    <?php $total = $total + ($row['pCount'] * $row['pprice']) ?>
                </td>
                <td><a href="cart.php?del_id=<?= $row['cart_id'] ?>" class="text-muted text-decoration-non">Delete</a> </td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td>Total</td>
            <td></td>
            <td><?= $total ?><span>&#8363</span></td>
        </tr>
    </table>
    <hr class="pt-5">
    <h5 class="fw mb-0 text-black">Total: <?=$total?></h5>
    <h5 class="fw-bold mb-0 p-5 ps-0 "><a href="homepage.php" class="text-body border border-dark p-1 bg-primary">Back to Home</a></h5>
</div>