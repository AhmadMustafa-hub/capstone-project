<?php
include("includes/header.php");
include("../admin/includes/classes.php");
$x = new Product();
$y = new category();
$cat = $y->readAll();
$data = $y->readById($_GET['cat_id']);
$pro = $x->readByCat($_GET['cat_id']);
?>

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $data[0]['cat_name']; ?></li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product List Start -->
<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php
                    if (!empty($pro)) {
                        foreach ($pro as $key => $v) {
                            echo "<div class='col-md-4'>";
                            echo "<div class='product-item'>";
                            echo "<div class='product-title'>";
                            echo "<a href='product-detail.php?pro_id={$v['pro_id']}'>{$v['pro_name']}</a>";
                            echo "</div>";
                            echo "<div class='product-image'>";
                            echo "<a href='product-detail.php?pro_id={$v['pro_id']}'>";
                            echo    " <img src='../admin/img/pro-pic/{$v['pro_image']}' alt='Product Image'>";
                            echo " </a>";
                            echo "<div class='product-action'>";
                            echo  "<a href='product-detail.php?pro_id={$v['pro_id']}'><i class='fa fa-search'></i></a>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='product-price'>";
                            echo "<h3><span>$</span>{$v['pro_price']}</h3>";
                            echo " </div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }


                    ?>

                </div>
            </div>

            <!-- Side Bar Start -->
            <div class="col-lg-4 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title">Category</h2>
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <?php
                            foreach ($cat as $key => $v) {
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link' href='cat.php?cat_id={$v['cat_id']}'><i class='fa fa-shopping-bag'></i>{$v['cat_name']}</a>";
                                echo " </li>";
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Side Bar End -->

        </div>
        <div class="recent-product product">

            <div class="container-fluid">
                <div class=" btns section-header row cat">
                    <h1>All Products</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">

                    <?php
                    $pro = new Product();
                    $pros = $pro->readAll();
                    foreach ($pros as $k => $v) {
                        echo "<div class='col-lg-3'>";
                        echo "<div class='product-item'>";
                        echo "<div class='product-title'>";
                        echo   "<a href='product-detail.php?pro_id={$v['pro_id']}'>{$v['pro_name']}</a>";
                        echo "</div>";
                        echo "<div class='product-image'>";
                        echo   " <a href='product-detail.php?pro_id={$v['pro_id']}'>";
                        echo     "  <img src='../admin/img/pro-pic/{$v['pro_image']}' alt='Product Image'>";
                        echo  " </a>";
                        echo "  <div class='product-action'>";
                        echo    "  <a href='product-detail.php?pro_id={$v['pro_id']}' class='hov'><i class='fa fa-search'></i></a>";
                        echo   "  </div>";
                        echo  " </div>";
                        echo " <div class='product-price'>";
                        echo    " <h3><span>$</span>{$v['pro_price']}</h3>";
                        echo  " </div>";
                        echo  "</div>";
                        echo "  </div>";
                    }


                    ?>




                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product List End -->
<hr class="style-four">

<?php
include("includes/brand.php");
?>
<hr class="style-four">


<?php
include("includes/footer.php");
?>