<?php
ob_start();
if (!isset($_SESSION['vendor_id'])) {
    include("includes/header.php");
} else {
    include("includes/vendor-header.php");
}
include("../admin/includes/classes.php");
$x = new Vendor();
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
    } elseif (empty($_POST['repass'])) {
        $error_repassword = "retype your password";
    } elseif ($_POST['vendor-password'] != $_POST['repass']) {
        $error_repassword = "passwords does not match";
    } else {
        $x->vendor_password = $_POST['vendor-password'];
    }
    if (empty($_POST['vendor-phone'])) {
        $error_phone = "phone is required";
    } else {
        $x->vendor_phone = $_POST['vendor-phone'];
    }
    if (empty($_POST['trade-name'])) {
        $error_trade = "Trade name is required";
    } else {
        $x->vendor_trade = $_POST['trade-name'];
    }

    if (empty($error_name) && empty($error_email) && empty($error_phone) && empty($error_password) && empty($error_repassword) && empty($error_trade)) {
        $e = $x->readAll();
        $flag = 0;
        $error = "";
        foreach ($e as $key => $value) {
            if ($value['vendor_email'] == $_POST['vendor-email']) {
                $flag = 1;
            }
        }
        if ($flag == 1) {
            $error = "You already have an account!";
        } else {
            $x->create();
            header("location:vendor-login.php");
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
                                <input class="form-control" type="text" placeholder="Name" name="vendor-name">
                                <?php if (isset($error_name)) {
                                    echo "<span class='text-danger'>*$error_name</span>";
                                } ?>
                            </div>

                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input class="form-control" type="email" placeholder="E-mail" name="vendor-email">
                                <?php if (isset($error_email)) {
                                    echo "<span class='text-danger'>*$error_email</span>";
                                } ?>
                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input class="form-control" type="password" placeholder="Password" name="vendor-password">
                                <?php if (isset($error_password)) {
                                    echo "<span class='text-danger'>*$error_password</span>";
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
                                <label>Trade Name</label>
                                <input class="form-control" type="text" placeholder="Trade Name" name="trade-name">
                                <?php if (isset($error_trade)) {
                                    echo "<span class='text-danger'>*$error_trade</span>";
                                } ?>
                            </div>
                            <div class="col-md-6">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="Mobile No" name="vendor-phone">
                                <?php if (isset($error_phone)) {
                                    echo "<span class='text-danger'>*$error_phone</span>";
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