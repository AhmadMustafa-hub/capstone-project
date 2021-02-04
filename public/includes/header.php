<?php
if (!isset($_SESSION)) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E Store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <style>
        
    </style>
</head>

<body>
    <!-- Top bar Start -->
    <div class="top-bar col2">
        <div class="container-fluid col2">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-envelope"></i>
                    mustafaahmad653@gmail.com
                </div>
                <div class="col-sm-6">
                    <i class="fa fa-phone-alt"></i>
                    +962775768343
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar End -->

    <!-- Nav Bar Start -->
    <div class="nav">
        <div class="container-fluid col">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark col">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between col" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="product-list.php" class="nav-item nav-link">Products</a>
                        <a href="cart.php" class="nav-item nav-link">Cart</a>
                        <a href="my-account.php" class="nav-item nav-link">My Account</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sell On EStore</a>
                            <div class="dropdown-menu navt">
                                <a href="vendor-login.php" class="dropdown-item"> Vendor Login</a>
                                <a href="vendor-signup.php" class="dropdown-item"> Vendor Register</a>
                                <a href="vendor-account.php" class="dropdown-item"> Vendor Account</a>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-nav ml-auto">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                            <div class="dropdown-menu navt">
                                <a href="login.php" class="dropdown-item">Login</a>
                                <a href="signup.php" class="dropdown-item">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="logo">
                        <a href="index.php">
                            <img src="img/logo2.jpg" alt="Logo" width="212px" height="200px">
                        </a>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="search">
                        <form method="post" action="product-search.php">
                            <input type="text" name="p_name" placeholder="Product Name">
                            <button type="submit" name="search"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>-->
                <div class="col-md-6 ">
                    <div class="user">
                        <a href="cart.php" class="btn cart cust-cart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->