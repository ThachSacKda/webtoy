<?php
include_once 'connect.php';
include_once 'header.php';

$conn = new Connect();
$db_link = $conn->connecToPDO();
if (isset($_GET['pcat_id'])) :
    $value = $_GET['pcat_id'];
    $sqlselect = "SELECT * FROM category WHERE pcat_id = ?";
    $stmt = $db_link->prepare($sqlselect);
    $stmt->execute(array("$value"));
    if ($stmt->rowCount() > 0) :
        $re = $stmt->fetch(PDO::FETCH_BOTH);
        $catname = $re['catName'];
    endif;
endif;
if (isset($_POST['txtName'])) :
    $cname = $_POST['txtName'];
    if (isset($_POST['btnAdd'])) :
        $cid = $_POST['txtID'];
        $sqlInsert = "INSERT INTO category(`pcat_id`,`catName`) VALUES (?,?)";
        $stmt = $db_link->prepare($sqlInsert);
        $execute = $stmt->execute(array("$cid", "$cname"));
        if ($execute) {
            header("Location: show.php");
            ob_clean();
        } else {
        }
    else :
        $cid = $_GET['pcat_id'];
        $sqlUpdate = "UPDATE category SET `pcat_id`=?, `catName`=? WHERE `pcat_id`=?";
        $stmt = $db_link->prepare($sqlUpdate);
        $execute = $stmt->execute(array("$cid", "$cname", "$cid"));
        if ($execute) {
            header("Location: show.php");
        } else {
            echo "Failed" . $execute;
        }
    endif;
endif;
?>
<div id="main" class="container">
    <div className="page-heading pb-2 mt-4 mb-2 ">
        <h1>Product Category</h1>
    </div>
    <?php
    ?>
    <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
        <div class="form-group pb-3">
            <label for="txtTen" class="col-sm-2 control-label">Category ID(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Category ID" 
                value='<?php echo isset($_GET["pcat_id"]) ? ($_GET["pcat_id"]) : ""; ?>'>
            </div>
        </div>
        <div class="form-group pb-3">
            <label for="txtTen" class="col-sm-2 control-label">Category Name(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Category Name" 
                value="<?php echo isset($catName) ? ($catName) : ''; ?>">
            </div>
        </div>


        <div class="form-group pb-3">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" name="<?php echo (isset($_GET["pcat_id"])) ? "btnEdit" : "btnAdd"; ?>" 
                id="btnAction" value='<?php echo (isset($_GET["pcat_id"])) ? "Edit" : "Add new"; ?>' />
                <input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Back to Category" 
                onclick="window.location.href='show.php'" />
            </div>
        </div>
        
    </form>
</div>

<?php
include_once 'footer.php';
?>