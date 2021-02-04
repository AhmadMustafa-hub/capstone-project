<?php
session_start();
if (!isset($_SESSION['vendor_id'])) {
    include("includes/header.php");
} else {
    include("includes/vendor-header.php");
}
include("../admin/includes/classes.php");
$x = new Product();
if (isset($_POST['search'])) {
    $pro = $x->readByName($_POST['p_name']);
} elseif (isset($_POST['submit'])) {
    $name = $_POST['pro_name'];
    $_SESSION[$_POST['pro_name']] = $_POST['num-product'];
    echo "<script>alert('$name Added To Your Cart !')</script>";
}
?>

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Product Detail</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-detail-top">
                    <div class="row align-items-center">

                        <div class="col-md-5">
                            <div class="product-slider-single normal-slider">
                                <?php if (!empty($pro)) {
                                    echo " <img src='../admin/img/pro-pic/{$pro[0]['pro_image']}'>";
                                } ?>
                            </div>

                        </div>
                        <div class="col-md-7">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="product-content">
                                    <div class="title">
                                        <h2><?php if (!empty($pro)) {
                                                echo $pro[0]['pro_name'];
                                            } else {
                                                echo "No products were found matching your search";
                                            } ?></h2>
                                        <input type="hidden" name="pro_name" value="<?php if (!empty($pro)) {
                                                                                        echo $pro[0]['pro_name'];
                                                                                    } ?>">
                                    </div>
                                    <?php
                                    if (!empty($pro)) {

                                        echo "<div class='price'>";
                                        echo "<h4>Price:</h4>";
                                        echo "<p>$";
                                        echo $pro[0]['pro_price'] . "</p>";
                                        echo "</div>";
                                        echo "<div class='quantity'>";
                                        echo "<h4>Quantity:</h4>";
                                        echo "<div class='qty'>";
                                        echo " <button class='btn-minus' onclick='return false'><i class='fa fa-minus'></i></button>";
                                        echo "<input type='text' value='1' name='num-product'>";
                                        echo " <button class='btn-plus' onclick='return false'><i class='fa fa-plus'></i></button>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "<div class='action'>";
                                        echo "<button type='submit' name='submit' class='btn'><i class='fa fa-shopping-cart'></i>Add to Cart</button>";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row product-detail-bottom">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#description">Description</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="description" class="container tab-pane active">
                                <h4>Product description</h4>
                                <p>
                                    <?php if (!empty($pro)) {
                                        echo  $pro[0]['pro_desc'];
                                    } ?> </p>
                            </div>

                            <div id="reviews" class="container tab-pane fade">

                                <div class="reviews-submit">
                                    <div class="row form">
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="email" placeholder="Email">
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea placeholder="Review"></textarea>
                                        </div>
                                        <div class="col-sm-12">
                                            <button>Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Product Detail End -->

<?php
include("includes/brand.php");
?>

<?php
include("includes/footer.php");
?>