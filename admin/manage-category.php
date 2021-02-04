<?php
ob_start();
include("includes/classes.php");
include("includes/header.php");
$x = new category();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $x->delete($id);
}

if (isset($_POST['save'])) {
    /* print_r($_POST);
    die;*/
    $name        = $_POST['cat-name'];
    $name        = addslashes($name);
    $x->cat_name = $name;
    $str         = $_POST['cat-desc'];
    $str         = addslashes($str);
    $x->cat_desc = $str;




    $cat_image = $_FILES['cat-image']['name'];
    $tmp_name    = $_FILES['cat-image']['tmp_name'];
    $path        = 'img/cat-pic/';
    move_uploaded_file($tmp_name, $path . $cat_image);
    $x->cat_image = $cat_image;
    $x->create();
}
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Manage Category</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <!-- FORM VALIDATION -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <h4><i class="fa fa-angle-right"></i> Create Category</h4>
                        <div class="form-panel">
                            <div class=" form">
                                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Category Name (required)</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="cname" name="cat-name" minlength="2" type="text" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Descreption (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="text" name="cat-desc" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Image (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="file" name="cat-image" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <input class="btn btn-theme" type="submit" name="save" value="Save">
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
                                <h4><i class="fa fa-angle-right"></i> Categries</h4>
                                <hr>
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-bullhorn"></i> ID</th>
                                        <th class="hidden-phone"><i class="fa fa-user"></i> Name</th>
                                        <th><i class="fa fa-stack-exchange"></i> Descreption</th>
                                        <th><i class=" fa fa-image"></i> Image</th>
                                        <th><i class=" fa fa-edit"></i> Edit</th>
                                        <th><i class=" fa fa-trash"></i> Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $vendors = $x->readAll();
                                    if (!empty($vendors)) {
                                        foreach ($vendors as $key => $value) {
                                            echo "<tr>";
                                            echo "<td>";
                                            echo $value['cat_id'];
                                            echo "</td>";
                                            echo "<td class='hidden-phone'>{$value['cat_name']}</td>";
                                            echo "<td>{$value['cat_desc']}</td>";
                                            echo "<td><img src='img/cat-pic/{$value['cat_image']}' width='50px' height='50px'> </td>";
                                            echo "<td>";
                                            echo "<a href='edit-category.php?id={$value['cat_id']}&image={$value['cat_image']}' class='btn btn-primary btn-xs' title='Edit'><i class='fa fa-pencil'></i></a>";
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<a href='manage-category.php?id={$value['cat_id']}' class='btn btn-danger btn-xs' title='Delete'><i class='fa fa-trash-o '></i></a>";
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