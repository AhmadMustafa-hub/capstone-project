<?php
ob_start();
include("includes/classes.php");
include("includes/header.php");
$x = new Product();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $x->delete($id);
}

if (isset($_POST['submit'])) {
    /* print_r($_POST);
    die;*/
    $x->pro_name = $_POST['pro-name'];


    $str = $_POST['pro-desc'];
    $str = addslashes($str);
    $x->pro_desc = $str;
    $x->pro_price = $_POST['pro-price'];
    $x->cat_id = $_POST['cat'];
    $x->vendor_id = $_POST['vendor'];
    $x->qty = $_POST['qty'];


    $pro_image = $_FILES['pro-image']['name'];
    $tmp_name    = $_FILES['pro-image']['tmp_name'];
    $path        = 'img/pro-pic/';
    move_uploaded_file($tmp_name, $path . $pro_image);
    $x->pro_image = $pro_image;
    $x->create();
}

?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Manage Product</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <!-- FORM VALIDATION -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <h4><i class="fa fa-angle-right"></i> Create Product</h4>
                        <div class="form-panel">
                            <div class=" form">
                                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Product Name (required)</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="cname" name="pro-name" minlength="2" type="text" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Descreption (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="text" name="pro-desc" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Price (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="text" name="pro-price" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Image (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="file" name="pro-image" required />
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Qty (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="text" name="qty" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Category (required)</label>
                                        <div class="col-lg-10">
                                            <select name="cat" class="form-control">
                                                <option value="" disabled selected>Select...</option>
                                                <?php
                                                $cat = new category();

                                                $data = $cat->readAll();
                                                foreach ($data as $k => $v) {
                                                    echo "<option value='{$v['cat_id']}'>{$v['cat_name']}</option>";
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
                                                    echo "<option value='{$v['vendor_id']}'>{$v['vendor_name']}</option>";
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
                <!-- row -->

            </div>
        </div>

        <div class="row mt">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <section id="no-more-tables">
                        <section class="wrapper">

                            <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i>Products</h4>
                                <thead class="cf">
                                    <tr>
                                        <th class="numeric"><i class="fa fa-bullhorn"></i> ID</th>
                                        <th class="numeric"><i class="fa fa-user"></i> Name</th>
                                        <th class="numeric"><i class="fa fa-stack-exchange"></i> Description</th>
                                        <th class="numeric"> <i class="fa fa-tags"></i>Category</th>
                                        <th class="numeric"><i class="fa fa-truck"></i>Vendor</th>
                                        <th class="numeric"><i class=" fa fa-image"></i>Image</th>
                                        <th class="numeric"><i class="fa fa-truck"></i>qty</th>
                                        <th class="numeric"><i class=" fa fa-edit"></i> Edit</th>
                                        <th class="numeric"><i class=" fa fa-trash"></i> Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $products = $x->readAllNotRand();
                                    if (!empty($products)) {
                                        foreach ($products as $key => $value) {
                                            echo "<tr>";
                                            echo "<td data-title='Code'>";
                                            echo $value['pro_id'];
                                            echo "</td>";
                                            echo "<td data-title='Company'>{$value['pro_name']}</td>";
                                            echo "<td class='numeric'>{$value['pro_desc']}</td>";
                                            echo "<td class='numeric'>{$value['cat_name']}</td>";
                                            echo "<td class='numeric'>{$value['vendor_name']}</td>";
                                            echo "<td class='numeric'><img src='img/pro-pic/{$value['pro_image']}' width='50px' height='50px'></td>";
                                            echo "<td class='numeric'>{$value['qty']}</td>";
                                            echo "<td class='numeric'>";
                                            echo "<a href='edit-product.php?id={$value['pro_id']}&image={$value['pro_image']}&cat={$value['cat_id']}&ven={$value['vendor_id']}' class='btn btn-primary btn-xs' title='Edit'><i class='fa fa-pencil'></i></a>";
                                            echo "</td>";
                                            echo "<td class='numeric'>";
                                            echo "<a href='manage-product.php?id={$value['pro_id']}' class='btn btn-danger btn-xs' title='Delete'><i class='fa fa-trash-o '></i></a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </section>

                    </section>
                </div>
                <!-- /content-panel -->
            </div>
        </div>
        <!-- /col-lg-4 -->
        <!-- /row -->
    </section>
    <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
<?php include("includes/footer.php"); ?>