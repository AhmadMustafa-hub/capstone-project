<?php
ob_start();
$conn = mysqli_connect('localhost', 'root', '', 'emall');
include("includes/header.php");
include("../admin/includes/classes.php");
if (isset($_POST['submit'])) {
    if (!isset($_SESSION['cust_id'])) {
        header('location:login.php');
    } else {
        
            $x = new order();
            $id = $_SESSION['cust_id'];
            $total = 0;
            $query2 = "insert into orders(cust_id)
                 values($id)";
            mysqli_query($conn, $query2);
            $last = mysqli_insert_id($conn);
            $data = $x->readByOrderId($last);

            foreach ($_SESSION['cart'] as $key => $val) {
                    $pro = new Product();
                    $pname = $pro->readByName($key);
                //echo $key ."=>".$val." ";
                $pros  = $pro->readByName($key);
                if ($pros[0]['pro_id'] == null) {
                    continue;
                } else {
                    $id_pro = $pros[0]['pro_id'];
                    $total = (float)$pros[0]['pro_price'] * $val;
                    $query3 = "insert into order_details(order_id,pro_id,qty,total,vendor_id)
                    values($last,$id_pro,$val,$total,{$pname[0]['vendor_id']})";
                    mysqli_query($conn, $query3);
                    unset($_SESSION['cart'][$key]);
                }
        }
    }
}
?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Checkout</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Start -->
<div class="checkout">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="checkout-inner">
                    <div class="checkout-summary">
                        <h1>Order ID <span><?php if (isset($data)) {
                                                echo $last;
                                            } ?></span></h1>
                        <div class="cart-content">
                            <h1>Cart Total <span>$<?php if (isset($_SESSION['total'])) {
                                                        echo $_SESSION['total'];
                                                    } ?></span></h1>
                        </div>
                        <div class="cart-content">
                            <h1>Date &nbsp; <span><?php if (isset($data)) {
                                                        echo $data[0]['order_date'];
                                                    } ?></span></h1>
                        </div>
                        <a href="index.php" class="btn">Back to home page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->
<?php
include("includes/footer.php");
?>