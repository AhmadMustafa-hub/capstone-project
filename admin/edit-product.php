<?php
ob_start();
include("includes/header.php");
include("includes/classes.php");
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
    $path        = 'img/pro-pic/';
    move_uploaded_file($tmp_name, $path . $pro_image);
    $x->pro_image = $pro_image;
    $x->update($_GET['id']);
    header("location:manage-product.php");
}
$customer = $x->readById($_GET['id']); ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-max-height">
        <h3><i class="fa fa-angle-right"></i> Manage Product</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <!-- FORM VALIDATION -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <h4><i class="fa fa-angle-right"></i> Edit Product</h4>
                        <div class="form-panel">
                            <div class=" form">
                                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Product Name (required)</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="cname" name="pro-name" minlength="2" type="text" value="<?php echo $customer[0]['pro_name']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Descreption (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="text" name="pro-desc" value="<?php echo $customer[0]['pro_desc']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Price (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="text" name="pro-price" value="<?php echo $customer[0]['pro_price']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Image (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="file" name="pro-image" />
                                            <?php echo "<img src='img/pro-pic/{$_GET['image']}' width= 50px height=50px>"; ?>

                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Qty (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="text" name="qty" value="<?php echo $customer[0]['qty']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Category (required)</label>
                                        <div class="col-lg-10">
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
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Vendor (required)</label>
                                        <div class="col-lg-10">
                                            <select name="vendor" class="form-control">
                                                <option value="" disabled selected>Select...</option>
                                                <?php
                                                $cat = new Vendor();

                                                $data = $cat->readAll();
                                                foreach ($data as $k => $v) {
                                                    if ($_GET['ven'] == $v['vendor_id']) {
                                                        echo "<option value='{$v['vendor_id']}' selected>{$v['vendor_name']}</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <input class="btn btn-theme" type="submit" name="submit" value="Save">
                                            <input class="btn btn-theme04" type="reset" value="Cancel">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /form-panel -->
                    </div>
                    <!-- /col-lg-12 -->
                </div>
                <!-- /row -->
            </div>
        </div>
    </section>
    <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
<?php include("includes/footer.php"); ?>