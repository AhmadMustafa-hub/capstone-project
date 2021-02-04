<?php
ob_start();
include("includes/header.php");
//include("includes/classes.php");
$x = new customer();
if (isset($_POST['submit'])) {
    $x->customer_name = $_POST['customer-name'];

    $x->customer_email = $_POST['customer-email'];

    $x->customer_password = $_POST['customer-password'];
    $x->customer_phone = $_POST['customer-phone'];
    $x->customer_address = $_POST['customer-address'];
    $x->update($_GET['id']);
    header("location:manage-customer.php");
}
$customer = $x->readById($_GET['id']);
?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-max-height">
    <h3><i class="fa fa-angle-right"></i> Manage Customer</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Edit Customer</h4>
            <div class="form-panel">
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="" enctype="multipart/form-data">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Name (required)</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="cname" name="customer-name" minlength="2" type="text" value="<?php echo $customer[0]['cust_name']; ?>" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">E-Mail (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="email" name="customer-email" value="<?php echo $customer[0]['cust_email']; ?>" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Password (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="password" name="customer-password" value="<?php echo $customer[0]['cust_password']; ?>" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Phone Number (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="text" name="customer-phone" value="<?php echo $customer[0]['mobile']; ?>" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Address (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="text" name="customer-address" value="<?php echo $customer[0]['address']; ?>" required />
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
