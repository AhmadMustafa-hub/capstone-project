<?php
ob_start();
include("includes/header.php");
include("includes/classes.php");
$x = new category();
if (isset($_POST['submit'])) {
    $name        = $_POST['cat-name'];
    $name        = addslashes($name);
    $x->cat_name = $name;

    $str         = $_POST['cat-desc'];
    $str         = addslashes($str);
    $x->cat_desc = $str;


    $cat_image   = $_FILES['cat-image']['name'];
    $tmp_name    = $_FILES['cat-image']['tmp_name'];
    $path        = 'img/cat-pic/';
    move_uploaded_file($tmp_name, $path . $cat_image);
    $x->cat_image = $cat_image;
    $x->update($_GET['id']);
    header("location:manage-category.php");
}
$customer = $x->readById($_GET['id']); ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Manage Category</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <!-- FORM VALIDATION -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <h4><i class="fa fa-angle-right"></i> Edit Category</h4>
                        <div class="form-panel">
                            <div class=" form">
                                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Category Name (required)</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="cname" name="cat-name" minlength="2" type="text" value="<?php echo $customer[0]['cat_name']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Descreption (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="text" name="cat-desc" value="<?php echo $customer[0]['cat_desc']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Image (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="file" name="cat-image" />
                                            <?php echo "<img src='img/cat-pic/{$_GET['image']}' width= 50px height=50px>"; ?>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <input class="btn btn-theme" type="submit" name="submit" value="Update">
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