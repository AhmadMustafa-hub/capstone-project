<?php
ob_start();
include("includes/header.php");
include("includes/classes.php");
$x = new Customer();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $x->delete($id);
}
if (isset($_POST['submit'])) {
  if (empty($_POST['customer-name'])) {
    $error_name = "name is required";
  } else {
    $x->customer_name = $_POST['customer-name'];
  }
  if (empty($_POST['customer-email'])) {
    $error_email = "email is required";
  } else {
    $x->customer_email = $_POST['customer-email'];
  }
  if (empty($_POST['customer-password'])) {
    $error_password = "password is required";
  } else {
    $x->customer_password = $_POST['customer-password'];
  }
  if (empty($_POST['customer-phone'])) {
    $error_phone = "phone is required";
  } else {
    $x->customer_phone = $_POST['customer-phone'];
  }
  if (empty($_POST['customer-address'])) {
    $error_address = "phone is required";
  } else {
    $x->customer_address = $_POST['customer-address'];
  }
  if (empty($error_name) && empty($error_email) && empty($error_image) && empty($error_password) && empty($error_password)) {
    $x->create();
  }
}
?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <h3><i class="fa fa-angle-right"></i> Manage Customer</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Create Customer</h4>
            <div class="form-panel">
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="" enctype="multipart/form-data">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Name (required)</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="cname" name="customer-name" minlength="2" type="text" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">E-Mail (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="email" name="customer-email" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Password (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="password" name="customer-password" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Phone Number (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="text" name="customer-phone" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Address (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="text" name="customer-address" required />
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
                <h4><i class="fa fa-angle-right"></i> Customers</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> ID</th>
                    <th class="hidden-phone"><i class="fa fa-user"></i> Name</th>
                    <th><i class="fa fa-envelope"></i> E-Mail</th>
                    <th><i class=" fa fa-phone"></i> Phone</th>
                    <th><i class=" fa fa-phone"></i> Address</th>
                    <th><i class=" fa fa-edit"></i> Edit</th>
                    <th><i class=" fa fa-trash"></i>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $customers = $x->readAll();
                  if (!empty($customers)) {
                    foreach ($customers as $key => $value) {
                      echo "<tr>";
                      echo "<td>";
                      echo $value['cust_id'];
                      echo "</td>";
                      echo "<td class='hidden-phone'>{$value['cust_name']}</td>";
                      echo "<td>{$value['cust_email']}</td>";
                      echo "<td>{$value['mobile']}</td>";
                      echo "<td>{$value['address']}</td>";
                      echo "<td>";
                      echo "<a href='edit-customer.php?id={$value['cust_id']}' class='btn btn-primary btn-xs' title='Edit'><i class='fa fa-pencil'></i></a>";
                      echo "</td>";
                      echo "<td>";
                      echo "<a href='manage-customer.php?id={$value['cust_id']}' class='btn btn-danger btn-xs' title='Delete'><i class='fa fa-trash-o '></i></a>";
                      echo "</td>";
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