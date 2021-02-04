<?php
ob_start();
include("includes/header.php");
include("includes/classes.php");
$x = new admin();
if (isset($_POST['submit'])) {
    $x->admin_name = $_POST['admin-name'];

    $x->admin_email = $_POST['admin-email'];

    $x->admin_password = $_POST['admin-password'];
        $admin_image = $_FILES['admin-image']['name'];
        $tmp_name    = $_FILES['admin-image']['tmp_name'];
        $path        = 'img/admin-pic/';
        move_uploaded_file($tmp_name, $path . $admin_image);
        $x->admin_image = $admin_image;
        $x->update($_GET['id']);
        header("location:index.php");
}
$admin = $x->readById($_GET['id']);
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-max-height">
        <h3><i class="fa fa-angle-right"></i> Manage Admin</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <!-- FORM VALIDATION -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <h4><i class="fa fa-angle-right"></i> Edit Admin</h4>
                        <div class="form-panel">
                            <div class=" form">
                                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Name </label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="cname" name="admin-name" minlength="2" type="text" value="<?php echo $admin[0]['admin_fullname']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">E-Mail</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="email" name="admin-email" value="<?php echo $admin[0]['admin_email']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Password</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="password" name="admin-password" value="<?php echo $admin[0]['admin_password']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Image</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="file" name="admin-image" />
                                            <?php echo "<img src='img/admin-pic/{$_GET['image']}' width= 50px height=50px>"; ?>
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