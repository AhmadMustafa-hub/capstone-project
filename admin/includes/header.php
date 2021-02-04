<?php
ob_start();
session_start();
include_once("classes.php");
if (!$_SESSION['admin_id']) {
  header("location:login.php");
}
$x=new Admin();
$admin=$x->readById($_SESSION['admin_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Admin Dashboard</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b>AD<span>MIN</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->

      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="index.php"><img src="img/admin-pic/<?php echo $admin[0]['admin_image']; ?>" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo $_SESSION['name']; ?></h5>
          <li class="mt">
            <a href="index.php">
              <i class="fa fa-archive"></i>
              <span>Manage Admin</span>
            </a>
          </li>
          <li class="mt">
            <a href="manage-vendor.php">
              <i class="fa fa-truck"></i>
              <span>Manage Vendor</span>
            </a>
          </li>
          <li class="mt">
            <a href="manage-customer.php">
              <i class="fa fa-users"></i>
              <span>Manage Customer</span>
            </a>
          </li>
          <li class="mt">
            <a href="manage-category.php">
              <i class="fa fa-tags"></i>
              <span>Manage Category</span>
            </a>
          </li>
          <li class="mt">
            <a href="manage-product.php">
              <i class="fa fa-shopping-cart"></i>
              <span>Manage Product</span>
            </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
   
