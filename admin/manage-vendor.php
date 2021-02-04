<?php
ob_start();
include("includes/header.php");
include("includes/classes.php");
$x = new Vendor();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $x->delete($id);
}
if (isset($_POST['submit'])) {
  if (empty($_POST['vendor-name'])) {
    $error_name = "name is required";
  } else {
    $x->vendor_name = $_POST['vendor-name'];
  }
  if (empty($_POST['vendor-email'])) {
    $error_email = "email is required";
  } else {
    $x->vendor_email = $_POST['vendor-email'];
  }
  if (empty($_POST['vendor-password'])) {
    $error_password = "password is required";
  } else {
    $x->vendor_password = $_POST['vendor-password'];
  }
  if (empty($_POST['vendor-phone'])) {
    $error_password = "phone is required";
  } else {
    $x->vendor_phone = $_POST['vendor-phone'];
  }
  if (empty($_POST['vendor-trade'])) {
    $error_trade = "trade name is required";
  } else {
    $x->vendor_trade = $_POST['vendor-trade'];
  }
 
  if (empty($error_name) && empty($error_email) && empty($error_password)) {
    $x->create();
  }
}
?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <h3><i class="fa fa-angle-right"></i> Manage Vendor</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Create Vendor</h4>
            <div class="form-panel">
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="" enctype="multipart/form-data">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Name (required)</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="cname" name="vendor-name" minlength="2" type="text" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">E-Mail (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="email" name="vendor-email" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Password (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="password" name="vendor-password" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Phone Number (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="text" name="vendor-phone" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Trade Name (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="text" name="vendor-trade" required />
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
        <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Vendors</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> ID</th>
                    <th class="hidden-phone"><i class="fa fa-user"></i> Name</th>
                    <th><i class="fa fa-envelope"></i> E-Mail</th>
                    <th><i class=" fa fa-phone"></i> Phone</th>
                    <th><i class=" fa fa-suitcase"></i> Trade Name</th>
                    <th><i class=" fa fa-edit"></i> Edit</th>
                    <th><i class=" fa fa-trash"></i>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $vendors = $x->readAll();
                  if (!empty($vendors)) {
                    foreach ($vendors as $key => $value) {
                      echo "<tr>";
                      echo "<td>";
                      echo $value['vendor_id'];
                      echo "</td>";
                      echo "<td class='hidden-phone'>{$value['vendor_name']}</td>";
                      echo "<td>{$value['vendor_email']}</td>";
                      echo "<td>{$value['vendor_phone']}</td>";
                      echo "<td>{$value['trade_name']}</td>";
                      echo "<td>";
                      echo "<a href='edit-vendor.php?id={$value['vendor_id']}' class='btn btn-primary btn-xs' title='Edit'><i class='fa fa-pencil'></i></a>";
                      echo "</td>";
                      echo "<td>";
                      echo "<a href='manage-vendor.php?id={$value['vendor_id']}' class='btn btn-danger btn-xs' title='Delete'><i class='fa fa-trash-o '></i></a>";
                      echo "</td>";
                      echo "</tr>";
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
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