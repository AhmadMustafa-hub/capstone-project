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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <style>
        body{
            background-color: white;
        }
       /* .test{
            background-color: #e8e9ea !important;
            style="background-color: silver !important; border:1px solid black !important;" 
            
        }*/
    
        .product-item .product-image img {
            width: 100%;
            height: 285px !important;
            align-self: center;
            transition: all .3s;
        }
        .col{
            background-color: gray !important;
            color:black ;
        }
        .col2{
            background-color: #222222 !important;
            color: blanchedalmond;


        }
        i{
            color:darkslategrey !important;
        }
        .navt{
            background-color: #e1e1e1 !important;
        }
       
      /*  .hov:hover {
            color: white !important;
           background-color: black !important;  
        }
       /* .cust-cart:hover{
            background-color: black !important;
            color: white !important;
        }*/
        .cat{
            color:gray !important;
        }
    </style>
</head>

<body>
    <!-- Top bar Start -->
    <div class="top-bar col2" >
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
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sell On EStore</a>
                            <div class="dropdown-menu navt">
                            <?php 
                            if(!isset($_SESSION['vendor_id'])){
                                echo "<a href='vendor-login.php' class='dropdown-item'>Login</a>";
                                echo "<a href='vendor-signup.php' class='dropdown-item'>Register</a>";
                                echo "<a href='vendor-account.php' class='dropdown-item'>Register</a>";

                            }else{
                                echo "<a href='vendor-logout.php' class='dropdown-item'>Logout</a>";
                            }
                                ?>
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
                            <img src="img/logo.png" alt="Logo">
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
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->
