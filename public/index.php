<?php
session_start();
if(!isset($_SESSION['vendor_id'])){
include("includes/header.php");
}else{
    include("includes/vendor-header.php");
}
include("../admin/includes/classes.php");
$c = new category();
$cat = $c->readRand();
?>
<!-- Main Slider Start -->
<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 test " >
                <nav class="navbar  ">
                    <ul class="navbar-nav" >
                        <li class="nav-item ">
                            <p class=" nav-item nav-link h5" href="#"><i class="fa fa-list" ></i>Categories:</p>
                        </li>
                        <?php
                        foreach ($cat as $key => $v) {
                            echo "<li class='nav-item test'>";
                            echo "<a class='nav-link' href='cat.php?cat_id={$v['cat_id']}'><i class='fa fa-shopping-bag'></i>{$v['cat_name']}</a>";
                            echo " </li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
            <div class="col-md-6">
                <div class="header-slider normal-slider custom-slick">
                    <div class="header-slider-item">
                        <img src="img/slider-1.jpg" alt="Slider Image" />
                        <div class="header-slider-caption">
                            <p>Every thing women's need </p>
                            <a class="btn" href="product-list.php"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                        </div>
                    </div>
                    <div class="header-slider-item">
                        <img src="img/e1.jpg" alt="Slider Image" />
                        <div class="header-slider-caption">
                            <p>Hp, Apple, Dell, and more...</p>
                            <a class="btn" href="product-list.php"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                        </div>
                    </div>
                    <div class="header-slider-item">
                        <img src="img/e.jpg" alt="Slider Image" />
                        <div class="header-slider-caption">
                            <p>Buy everything when you at home</p>
                            <a class="btn" href="product-list.php"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="header-img custom-header">
                    <div class="img-item">
                        <img src="img/blog-01.jpg" />
                        <a class="img-text" href="product-list.php">
                            <p>Best brands in the world</p>
                        </a>
                    </div>
                    <div class="img-item">
                        <img src="img/category-2.jpg" />
                        <a class="img-text" href="product-list.php">
                            <p>Let's See Our Products</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Slider End -->
<!-- Feature Start-->
<div data-aos="fade-up"
     data-aos-anchor-placement="center-bottom" class="feature mt-4 mb-4">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-truck"></i>
                    <h2>Worldwide Delivery</h2>
                    <p>
                        we ship to over 200 countries & regions.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-sync-alt"></i>
                    <h2>90 Days Return</h2>
                    <p>
                        You Can Return Your Product In 90 Days.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-comments"></i>
                    <h2>24/7 Support</h2>
                    <p>
                        Round-the-clock assistance for a smooth shopping experience.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End-->


<hr class="style-four">

<!-- Category Start-->
<div class="category mt-1 mb-2 " >

    <div class="container-fluid">
        <div class="product cat">
            <div class="section-header cat">
                <h1>Categories</h1>
            </div>
        </div>
        <div class="row">
            <?php
            $x = new category();
            $data = $x->readGrid();
            foreach ($data as $k => $v) {
                echo "<div class='col-md-3'>";
                echo "<div class='category-item ch-400'>";
                echo "<img src='../admin/img/cat-pic/{$v['cat_image']}' />";
                echo "<a class='category-name ' href='cat.php?cat_id={$v['cat_id']}'>";
                echo "<p>{$v['cat_desc']}</p>";
                echo "</a>";
                echo "</div>";
                echo "</div>";
            }
            ?>

            <!--<div class="col-md-3">
                <div class="category-item ch-250">
                    <img src="img/category-4.jpg" />
                    <a class="category-name" href="">
                        <p>Some text goes here that describes the image</p>
                    </a>
                </div>
                <div class="category-item ch-150">
                    <img src="img/category-5.jpg" />
                    <a class="category-name" href="">
                        <p>Some text goes here that describes the image</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-item ch-150">
                    <img src="img/category-6.jpg" />
                    <a class="category-name" href="">
                        <p>Some text goes here that describes the image</p>
                    </a>
                </div>
                <div class="category-item ch-250">
                    <img src="img/category-7.jpg" />
                    <a class="category-name" href="">
                        <p>Some text goes here that describes the image</p>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="category-item ch-400">
                    <img src="img/category-3.jpg" />
                    <a class="category-name" href="">
                        <p>Some text goes here that describes the image</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-item ch-400">
                    <img src="img/category-4.jpg" />
                    <a class="category-name" href="">
                        <p>Some text goes here that describes the image</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-item ch-400">
                    <img src="img/category-5.jpg" />
                    <a class="category-name" href="">
                        <p>Some text goes here that describes the image</p>
                    </a>
                </div>
            </div>-->
        </div>
    </div>
</div>
<!-- Category End-->
<hr class="style-four">

<?php include("includes/brand.php"); ?>
<hr class="style-four">




<!-- Call to Action Start -->
<div class="call-to-action cat col ">
    <div class="container-fluid">
        <div class="row align-items-center cat">
            <div class="col-md-6">
                <h1>call us for any queries</h1>
            </div>
            <div class="col-md-6">
                <a href="tel:00962775768343">+962775768343</a>
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->


<!-- Recent Product Start -->
<div class="recent-product product" data-aos="zoom-in">
    <div class="container-fluid">
        <div class="section-header cat">
            <h1>Products</h1>
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
<!-- Recent Product End -->
<?php
include("includes/footer.php");
?>