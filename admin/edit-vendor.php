<?php
ob_start();
include("includes/header.php");
include("includes/classes.php");
$x = new Vendor();
if (isset($_POST['submit'])) {
    $x->vendor_name = $_POST['vendor-name'];

    $x->vendor_email = $_POST['vendor-email'];

    $x->vendor_password = $_POST['vendor-password'];
    $x->vendor_phone = $_POST['vendor-phone'];
    $x->vendor_trade = $_POST['vendor-trade'];
    $x->update($_GET['id']);
    header("location:manage-vendor.php");
}
$vendor = $x->readById($_GET['id']);
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-max-height">
        <h3><i class="fa fa-angle-right"></i> Manage Vendor</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <!-- FORM VALIDATION -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <h4><i class="fa fa-angle-right"></i> Edit Vendor</h4>
                        <div class="form-panel">
                            <div class=" form">
                                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Name (required)</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="cname" name="vendor-name" minlength="2" type="text" value="<?php echo $vendor[0]['vendor_name']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">E-Mail (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="email" name="vendor-email" value="<?php echo $vendor[0]['vendor_email']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Password (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="password" name="vendor-password" value="<?php echo $vendor[0]['vendor_password']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Phone Number (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="text" name="vendor-phone" value="<?php echo $vendor[0]['vendor_phone']; ?>" required />
                                        </div>
                                    </div>
                                   
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Trade Name (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="text" name="vendor-trade" value="<?php echo $vendor[0]['trade_name']; ?>" required />
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