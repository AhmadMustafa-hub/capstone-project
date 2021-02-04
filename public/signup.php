<?php
ob_start();
if (!isset($_SESSION['vendor_id'])) {
    include("includes/header.php");
} else {
    include("includes/vendor-header.php");
}
include("../admin/includes/classes.php");
$x = new Customer();
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
    } elseif (empty($_POST['repass'])) {
        $error_repassword = "retype your password";
    } elseif ($_POST['customer-password'] != $_POST['repass']) {
        $error_repassword = "passwords does not match";
    } else {
        $x->customer_password = $_POST['customer-password'];
    }
    if (empty($_POST['customer-phone'])) {
        $error_phone = "phone is required";
    } else {
        $x->customer_phone = $_POST['customer-phone'];
    }
    if (empty($_POST['customer-address'])) {
        $error_address = "address is required";
    } else {
        $x->customer_address = $_POST['customer-address'];
    }
    if (empty($error_name) && empty($error_email) && empty($error_phone) && empty($error_password) && empty($error_repassword) && empty($error_address)) {
        $e = $x->readAll();
        $flag = 0;
        $error = "";
        foreach ($e as $key => $value) {
            if ($value['cust_email'] == $_POST['customer-email']) {
                $flag = 1;
            }
        }
        if ($flag == 1) {
            $error = "You already have an account!";
        } else {
            $x->create();
            header("location:login.php");
        }
    }
}
?>

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Register</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="register-form">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Full Name</label>
                                <input class="form-control" type="text" placeholder="Name" name="customer-name">
                                <?php if (isset($error_name)) {
                                    echo "<span class='text-danger'>*$error_name</span>";
                                } ?>
                            </div>
                            <div class="col-md-6">
                                <label>Retype Password</label>
                                <input class="form-control" type="password" placeholder="Password" name="repass">
                                <?php if (isset($error_repassword)) {
                                    echo "<span class='text-danger'>*$error_repassword</span>";
                                } ?>
                            </div>
                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input class="form-control" type="email" placeholder="E-mail" name="customer-email">
                                <?php if (isset($error_email)) {
                                    echo "<span class='text-danger'>*$error_email</span>";
                                } ?>
                            </div>
                            <div class="col-md-6">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="Mobile No" name="customer-phone">
                                <?php if (isset($error_phone)) {
                                    echo "<span class='text-danger'>*$error_phone</span>";
                                } ?>
                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input class="form-control" type="password" placeholder="Password" name="customer-password">
                                <?php if (isset($error_password)) {
                                    echo "<span class='text-danger'>*$error_password</span>";
                                } ?>
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input class="form-control" type="text" placeholder="Name" name="customer-address">
                                <?php if (isset($error_address)) {
                                    echo "<span class='text-danger'>*$error_address</span>";
                                } ?>
                            </div>
                            <div class="col-md-12">
                                <button class="btn" type="submit" name="submit">Submit</button>

                            </div>
                            <?php if (isset($error)) {
                                echo "<span class='text-danger'>*$error</span>";
                            } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login End -->

<?php
include("includes/footer.php");
?>