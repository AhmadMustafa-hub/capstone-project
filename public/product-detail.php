<?php
session_start();
if (!isset($_SESSION['vendor_id'])) {
    include("includes/header.php");
} else {
    include("includes/vendor-header.php");
}
include("../admin/includes/classes.php");
$x = new Product();
$pro = $x->readById($_GET['pro_id']);
if (isset($_POST['submit'])) {
    $name = $_POST['pro_name'];
    $_SESSION['cart'][$_POST['pro_name']] = $_POST['num-product'];
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
                                <img src='../admin/img/pro-pic/<?php echo $pro[0]['pro_image']; ?>' alt="Product Image">
                            </div>

                        </div>
                        <div class="col-md-7">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="product-content">
                                    <div class="title">
                                        <h2><?php echo $pro[0]['pro_name']; ?></h2>
                                        <input type="hidden" name="pro_name" value="<?php echo $pro[0]['pro_name']; ?>">
                                    </div>

                                    <div class="price">
                                        <h4>Price:</h4>
                                        <p>$<?php echo $pro[0]['pro_price']; ?></p>
                                    </div>
                                    <div class="quantity">
                                      <?php 
                                      if(!isset($_SESSION['vendor_id'])){
                                          echo"<h4>Quantity:</h4>";
                                      }
                                      ?>
                                        
                                        <div class="qty">
                                            <?php
                                            if(!isset($_SESSION['vendor_id'])){
                                                echo "<button class='btn-minus' onclick='return false'><i class='fa fa-minus'></i></button>";
                                                echo "<input type='text' value='1' name='num-product'>";
                                                echo "<button class='btn-plus' onclick='return false'><i class='fa fa-plus'></i></button>";
                                            }

                                            ?>
                                        </div>
                                    </div>
                                    <div class="action">
                                        <?php if (!isset($_SESSION['vendor_id'])) {
                                            echo "<button type='submit' name='submit' class='btn'><i class='fa fa-shopping-cart'></i>Add to Cart</button>";
                                        }

                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row product-detail-bottom">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#description">Descreption</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#vendor">More Info</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="description" class="container tab-pane active">
                                <h2>Product description</h2>
                                <p class="h3">
                                    <?php echo $pro[0]['pro_desc']; ?> </p>
                            </div>
                            <div id="vendor" class="container tab-pane fade">

                                <h4>Product By.</h4>
                                <p class="h1">
                                    <?php echo "<a href='vendor-products.php?info={$pro[0]['vendor_id']}'>{$pro[0]['vendor_name']}</a>"; ?> </p>
                                <p class="h5">
                                    Store Includes: <?php echo "{$pro[0]['trade_name']}"; ?> </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>
<!-- Product Detail End -->
<hr class="style-four">

<?php
include("includes/brand.php");
?>
<hr class="style-four">


<?php
include("includes/footer.php");
?>
