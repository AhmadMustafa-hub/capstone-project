<?php
ob_start();
if (!isset($_SESSION['vendor_id'])) {
    include("includes/header.php");
} else {
    include("includes/vendor-header.php");
}
include("../admin/includes/classes.php");
$x = new Product();
if (isset($_POST['submit'])) {
    $x->pro_name = $_POST['pro-name'];

    $str = $_POST['pro-desc'];
    $str = addslashes($str);
    $x->pro_desc = $str;

    $x->pro_price = $_POST['pro-price'];

    $x->cat_id = $_POST['cat'];
    $x->qty = $_POST['qty'];


    $pro_image = $_FILES['pro-image']['name'];
    $tmp_name    = $_FILES['pro-image']['tmp_name'];
    $path        = '../admin/img/pro-pic/';
    move_uploaded_file($tmp_name, $path . $pro_image);
    $x->pro_image = $pro_image;
    $x->vendorUpdate($_GET['id']);
    header("location:vendor-account.php");
}
$pro = $x->readById($_GET['id']);
?>

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="vendor-account.php">Account</a></li>
            <li class="breadcrumb-item active">Edit product</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="register-form">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Product Name</label>
                                <input class="form-control" type="text" placeholder="Name" name="pro-name" value="<?php echo $pro[0]['pro_name']; ?>">

                            </div>
                            <div class="col-md-6">
                                <label>Product Description</label>
                                <input class="form-control" type="text" name="pro-desc" value="<?php echo $pro[0]['pro_desc']; ?>">

                            </div>
                            <div class="col-md-6">
                                <label>Price</label>
                                <input class="form-control" type="text" name="pro-price" value="<?php echo $pro[0]['pro_price']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label>Category</label>
                                <select name="cat" class="form-control">
                                    <option value="" disabled selected>Select...</option>
                                    <?php
                                    $pro2 = new category();
                                    $data = $pro2->readAll();
                                    foreach ($data as $k => $v) {
                                        if ($_GET['cat'] == $v['cat_id']) {
                                            echo "<option value='{$v['cat_id']}' selected>{$v['cat_name']}</option>";
                                        } else {
                                            echo "<option value='{$v['cat_id']}'>{$v['cat_name']}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Quantity</label>
                                <input class="form-control" type="text" value="<?php echo $pro[0]['qty']; ?>" name="qty">
                               
                            </div>
                            <div class="col-md-6">
                                <label>Image</label>
                                <input class="form-control" type="file" name="pro-image">
                                <?php echo "<img src='../admin/img/pro-pic/{$_GET['image']}' width= 50px height=50px>"; ?>
                            </div>
                           
                            <div class="col-md-12">
                                <button class="btn" type="submit" name="submit">Submit</button>

                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login End -->

<?php
include("includes/footer.php");
?>
