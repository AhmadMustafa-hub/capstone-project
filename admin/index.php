<?php
include("includes/header.php");
include("includes/classes.php");
$x = new admin();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $x->delete($id);
}

if (isset($_POST['submit'])) {
  if (empty($_POST['admin-name'])) {
    $error_name = "name is required";
  } else {
    $x->admin_name = $_POST['admin-name'];
  }
  if (empty($_POST['admin-email'])) {
    $error_email = "email is required";
  } else {
    $x->admin_email = $_POST['admin-email'];
  }
  if (empty($_POST['admin-password'])) {
    $error_password = "password is required";
  } else {
    $x->admin_password = $_POST['admin-password'];
  }
  if (empty($_FILES['admin-image']['name'])) {
    $error_image = "image is required";
  } else {
    $admin_image = $_FILES['admin-image']['name'];
    $tmp_name    = $_FILES['admin-image']['tmp_name'];
    $path        = 'img/admin-pic/';
    move_uploaded_file($tmp_name, $path . $admin_image);
    $x->admin_image = $admin_image;
  }
  if (empty($error_name) && empty($error_email) && empty($error_image) && empty($error_password)) {
    $x->create();
  }
}
?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <h3><i class="fa fa-angle-right"></i> Manage Admin</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Create Admin</h4>
            <div class="form-panel">
              <div class=" form">
                <form class="cmxform form-horizontal style-form" method="post" action="" enctype="multipart/form-data">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Name (required)</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="cname" name="admin-name" minlength="2" type="text" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">E-Mail (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="email" name="admin-email" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Password (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="password" name="admin-password" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Image (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="file" name="admin-image" required />
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
                <h4><i class="fa fa-angle-right"></i> Admins</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> ID</th>
                    <th class="hidden-phone"><i class="fa fa-user"></i> Name</th>
                    <th><i class="fa fa-envelope"></i> E-Mail</th>
                    <th><i class=" fa fa-image"></i> Image</th>
                    <th><i class=" fa fa-edit"></i> Edit</th>
                    <th><i class=" fa fa-trash"></i>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $admins = $x->readAll();
                  if (!empty($admins)) {
                    foreach ($admins as $key => $value) {
                      echo "<tr>";
                      echo "<td>";
                      echo $value['admin_id'];
                      echo "</td>";
                      echo "<td class='hidden-phone'>{$value['admin_fullname']}</td>";
                      echo "<td>{$value['admin_email']}</td>";
                      echo "<td><img src='img/admin-pic/{$value['admin_image']}' width='50px' height='50px'> </td>";

                      echo "<td>";
                      echo "<a href='edit-admin.php?id={$value['admin_id']}&image={$value['admin_image']}' class='btn btn-primary btn-xs' title='Edit'><i class='fa fa-pencil'></i></a>";
                      echo "</td>";
                      echo "<td>";
                      echo "<a href='index.php?id={$value['admin_id']}' class='btn btn-danger btn-xs' title='Delete'><i class='fa fa-trash-o '></i></a>";
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