<?php
if (!isset($_SESSION)) {
    session_start();
}
include("includes/header.php");
include("../admin/includes/classes.php");
$x = new Product();
if (isset($_POST['submit'])) {
    unset($_SESSION[$_POST['del']]);
}
?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Cart</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <?php
                                if (!empty($_SESSION['cart'])) {
                                    $total = 0;
                                    foreach ($_SESSION['cart'] as $key => $val) {
                                        //echo $key ."=>".$val." ";
                                        $data = $x->readByName($key);
                                        if ($data[0]['pro_id'] == null) {
                                            continue;
                                        } else {
                                            echo "<form method='post' action=''>";
                                            echo "<input type='hidden' id='del' name='del' id='' value='$key'>";
                                            $total = $total + ((float)$data[0]['pro_price'] * $val);
                                            $m = (float)$data[0]['pro_price'];
                                            $smallTotal = $m * $val;
                                            echo "<tr>";
                                            echo "<td>";
                                            echo " <div class='img'>";
                                            echo "<a ><img src='../admin/img/pro-pic/{$data[0]['pro_image']}' alt='Image'></a>";
                                            echo "<p>{$data[0]['pro_name']}</p>";
                                            echo "</div>";
                                            echo "</td>";
                                            echo "<td>{$data[0]['pro_price']}</td>";
                                            echo "<td>";
                                            echo "<div class='img'>";
                                            echo "<p>{$val}</p>";
                                            echo "</div>";
                                            echo "</td>";
                                            echo " <td>{$smallTotal}</td>";
                                            echo "<td><button type='submit' name='submit'><i class='fa fa-trash'></i></button></td>";
                                            echo "</tr>";
                                            echo "</form>";
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Cart Total <span>$<?php if (!empty($_SESSION['cart'])) {
                                                                $_SESSION['total'] = $total;
                                                                echo $total;
                                                            } ?></span></h1>
                                </div>
                                <form action="checkout.php" method="post">
                                <div class="cart-btn pl-5 ml-5">
                                    <button  class="btn" type="submit" name="submit">Checkout</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->


<?php
include("includes/footer.php");
?>