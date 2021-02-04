<?php
ob_start();
session_start();
if (!isset($_SESSION['vendor_id'])) {
    include("includes/header.php");
} else {
    include("includes/vendor-header.php");
}
include("../admin/includes/classes.php");
$cust = new Customer();
$customer = $cust->readById($_SESSION['cust_id']);
if (!isset($_SESSION['cust_id'])) {
    header("location:login.php");
} else {
    $x = new order();
    $y = new order_details();
    $z = new Product();
    $orders = $x->readById($_SESSION['cust_id']);
}
if (isset($_POST['submit'])) {
    if (empty($_POST['password'])) {
        $cust->customer_name = $_POST['customer-name'];
        $cust->customer_email = $_POST['customer-email'];
        $cust->customer_phone = $_POST['customer-phone'];
        $cust->customer_address = $_POST['customer-address'];
        $cust->update($_SESSION['cust_id']);
        $customer = $cust->readById($_SESSION['cust_id']);
    } else {
        if ($_POST['password'] != $customer[0]['cust_password']) {
            $errorpass = "Incorrect Password please try again";
        } elseif ($_POST['newpass'] != $_POST['repass']) {
            $errorre = "passwords does not match";
        } else {
            $cust->customer_name = $_POST['customer-name'];
            $cust->customer_email = $_POST['customer-email'];
            $cust->customer_phone = $_POST['customer-phone'];
            $cust->customer_address = $_POST['customer-address'];
            $cust->customer_password = $_POST['newpass'];
            $cust->update($_SESSION['cust_id']);
            $customer = $cust->readById($_SESSION['cust_id']);
        }
    }
}


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
                    <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                    <a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Order No.</th>
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
                                            $details = $y->readById($v['order_id']);
                                            if (!empty($details)) {
                                                foreach ($details as $k2 => $v2) {
                                                    $pros = $z->readById($v2['pro_id']);
                                                    echo "<tr>";
                                                    echo "<td>{$v['order_id']}</td>";
                                                    echo "<td>";
                                                    echo "<p>{$pros[0]['pro_name']}</p>";
                                                    echo "<div class='img'>";
                                                    echo "<a ><img src='../admin/img/pro-pic/{$pros[0]['pro_image']}' alt='Image' width='50px' height='50px'></a>";
                                                    echo "</div>";
                                                    echo " </td>";
                                                    echo "<td>{$v['order_date']}</td>";
                                                    echo "<td>{$pros[0]['pro_price']}</td>";
                                                    echo "<td>{$v2['qty']}</td>";
                                                    echo "</tr>";
                                                }
                                            }
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
                                    <input class="form-control" type="text" name="customer-name" value="<?php echo $customer[0]['cust_name']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="customer-phone" value="<?php echo $customer[0]['mobile']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="email" name="customer-email" value="<?php echo $customer[0]['cust_email']; ?>">
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="customer-address" value="<?php echo $customer[0]['address']; ?>">
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

                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account End -->

<?php
include("includes/footer.php");
?>