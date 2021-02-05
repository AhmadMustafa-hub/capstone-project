<?php
ob_start();
session_start();
include("../admin/includes/classes.php");
if (!isset($_SESSION['vendor_id'])) {
    include("includes/header.php");
} else {
    include("includes/vendor-header.php");
}
if (isset($_GET['delete-id'])) {
    $x=new Product();
    $id = $_GET['delete-id'];
    $x->delete($id);
}

$vendor = new Vendor();
if (!isset($_SESSION['vendor_id'])) {
    header("location:vendor-login.php");
} else {
    $x = new order();
    $y = new order_details();
    $z = new Product();
    $orders = $y->readByVendorId($_SESSION['vendor_id']);
}
if (isset($_POST['submit'])) {
    if (empty($_POST['password'])) {
        $vendor->vendor_name = $_POST['vendor-name'];
        $vendor->vendor_email = $_POST['vendor-email'];
        $vendor->vendor_phone = $_POST['vendor-phone'];
        $vendor->vendor_trade = $_POST['vendor-trade'];
        $vendor->update($_SESSION['vendor_id']);
        $vendors = $vendor->readById($_SESSION['vendor_id']);
    } else {
        $vendors = $vendor->readById($_SESSION['vendor_id']);
        if ($_POST['password'] != $vendors[0]['vendor_password']) {
            $errorpass = "Incorrect Password please try again";
        } elseif ($_POST['newpass'] != $_POST['repass']) {
            $errorre = "passwords does not match";
        } else {
            $vendor->vendor_name = $_POST['vendor-name'];
            $vendor->vendor_email = $_POST['vendor-email'];
            $vendor->vendor_phone = $_POST['vendor-phone'];
            $vendor->vendor_trade = $_POST['vendor-trade'];
            $vendor->vendor_password = $_POST['newpass'];
            $vendor->update($_SESSION['vendor_id']);
            $vendors = $vendor->readById($_SESSION['vendor_id']);
        }
    }
}
if (isset($_POST['save'])) {
    $x=new Product();
    /* print_r($_POST);
    die;*/
    $x->pro_name = $_POST['pro-name'];


    $str = $_POST['pro-desc'];
    $str = addslashes($str);
    $x->pro_desc = $str;
    $x->pro_price = $_POST['pro-price'];
    $x->cat_id = $_POST['cat'];
    $x->vendor_id = $_SESSION['vendor_id'];
    $x->qty = $_POST['qty'];


    $pro_image = $_FILES['pro-image']['name'];
    $tmp_name    = $_FILES['pro-image']['tmp_name'];
    $path        = '../admin/img/pro-pic/';
    move_uploaded_file($tmp_name, $path . $pro_image);
    $x->pro_image = $pro_image;
    $x->create();
}

$vendor = $vendor->readById($_SESSION['vendor_id']);
?>

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">My Account</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- My Account Start -->
<div class="my-account">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                    <a class="nav-link" id="orders-nav" data-toggle="pill" href="#products-tab" role="tab"><i class="fa fa-shopping-bag"></i>Products</a>
                    <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                    <a class="nav-link" id="account-nav" data-toggle="pill" href="#add-tab" role="tab"><i class="fa fa-plus"></i>Add Product</a>
                    <a class="nav-link" href="vendor-logout.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Product</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($orders)) {
                                        foreach ($orders as $k => $v) {
                                            $pros = $z->readById($v['pro_id']);
                                            echo "<tr>";
                                            echo "<td>{$pros[0]['pro_name']}</td>";
                                            echo "<td>{$v['date']}</td>";
                                            echo "<td>{$pros[0]['pro_price']}</td>";
                                            echo "<td>{$v['qty']}</td>";
                                            echo "</tr>";
                                        }
                                    }


                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="products-tab" role="tabpanel" aria-labelledby="orders-nav">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Desc</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Quantity</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $prods = $z->readByVendor($_SESSION['vendor_id']);
                                    if (!empty($prods)) {
                                        foreach ($prods as $k => $v2) {
                                            echo "<tr>";
                                            echo "<td>{$v2['pro_id']}</td>";
                                            echo "<td>{$v2['pro_name']}";
                                            echo "<img src='../admin/img/pro-pic/{$v2['pro_image']}' width='50px' height='50px'></td>";
                                            echo "<td>{$v2['pro_desc']}</td>";
                                            echo "<td>{$v2['pro_price']}</td>";
                                            echo "<td>{$v2['cat_name']}</td>";
                                            echo "<td>{$v2['qty']}</td>";
                                            echo "<td>";
                                            echo "<a href='edit-pro.php?id={$v2['pro_id']}&image={$v2['pro_image']}&cat={$v2['cat_id']}&ven={$v2['vendor_id']}' class='btn btn-primary btn-xs' title='Edit'><i class='fa fa-pen'></i></a>";
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<a href='vendor-account.php?delete-id={$v2['pro_id']}' class='btn btn-danger btn-xs' title='Delete'><i class='fa fa-trash'></i></a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    }


                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                        <h4>Account Details</h4>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="vendor-name" value="<?php echo $vendor[0]['vendor_name']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="vendor-phone" value="<?php echo $vendor[0]['vendor_phone']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="email" name="vendor-email" value="<?php echo $vendor[0]['vendor_email']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="vendor-trade" value="<?php echo $vendor[0]['trade_name']; ?>">
                                </div>

                            </div>
                            <h4>Password change</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control" type="password" placeholder="Current Password" name="password">
                                    <?php if (isset($errorpass)) {
                                        echo "<span class='text-danger'>$errorpass</span>";
                                    } ?>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" placeholder="New Password" name="newpass">
                                    <?php if (isset($errorre)) {
                                        echo "<span class='text-danger'>$errorre</span>";
                                    } ?>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" placeholder="Confirm Password" name="repass">
                                </div>
                                <div class="col-md-12">
                                    <button class="btn" type="submit" name="submit">Save Changes</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="tab-pane fade" id="add-tab" role="tabpanel" aria-labelledby="account-nav">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <h4>Add Product</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Product Name" name="pro-name">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Description" name="pro-desc">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Price" name="pro-price">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Quantity" name="qty">
                            </div>
                            <div class="col-md-6">
                                <label>Product Image</label>
                                <input class="form-control" type="file" name="pro-image">
                            </div>
                            <div class="col-md-6">
                                <select name="cat" class="form-control">
                                    <option value="" disabled selected>Category...</option>
                                    <?php
                                    $cat = new category();

                                    $data = $cat->readAll();
                                    foreach ($data as $k => $v) {
                                        echo "<option value='{$v['cat_id']}'>{$v['cat_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <button class="btn" type="submit" name="save">Add Product</button>
                                <br><br>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account End -->

<?php
include("includes/footer.php");
?>
