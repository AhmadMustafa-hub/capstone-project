<?php
ob_start();
include("includes/header.php");
include("../admin/includes/classes.php");
$x=new Customer();
if (isset($_POST['submit'])) {
    $error = "";
    $x->customer_email= $_POST['email'];
    $x->customer_password = $_POST['password'];
    $data=$x->login();

    if ($data[0]['cust_id']) {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['cust_name'] = $data[0]['cust_name'];
        $_SESSION['cust_id'] = $data[0]['cust_id'];
        header("location:index.php");
    } else {
        $error = "incorrect email or password";
    }
}
?>
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" type="email" name="email" placeholder="E-mail">
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="col-md-12">
                                    <button class="btn" type="submit" name="submit">Login</button>
                                </div>
                                <?php if (isset($error)) {
                                    echo "<span class='text-danger'>$error</span>";
                                } ?>
                                <p >Not have an account?<a class="text-info" href="signup.php"> Sign up</a>
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
