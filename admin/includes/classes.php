<?php

require('DBconnection.php');
//*******************************************START ADMIN CLASS********************************************************** */
class Admin extends dbconnection
{

    public $admin_email;
    public $admin_password;
    public $admin_name;
    public $admin_image;



    public function create()
    {
        $query = "INSERT INTO admin(admin_email,admin_password,admin_fullname,admin_image)
				 VALUES('$this->admin_email','$this->admin_password','$this->admin_name','$this->admin_image')";
        $this->performQuery($query);
    }

    public function readAll()
    {
        $query  = "SELECT * FROM admin";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function readById($id)
    {
        $query  = "SELECT * FROM admin WHERE admin_id = $id";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function update($id)
    {

        if (empty($this->admin_image)) {



            $query = " UPDATE admin SET admin_email    = '$this->admin_email',
								    admin_fullname     = '$this->admin_name'
								    admin_password    = '$this->admin_password'
								   WHERE admin_id = $id";
        } else {


            $query = " UPDATE admin SET admin_email    = '$this->admin_email',
								    admin_fullname     = '$this->admin_name',
								    admin_password     = '$this->admin_password',
								    admin_image    = '$this->admin_image'
								   WHERE admin_id = $id";
        }





        $this->performQuery($query);
    }
    public function delete($id)
    {

        //$id=$_GET['delete_id'];
        $query = "DELETE FROM admin WHERE admin_id =$id ";
        $this->performQuery($query);
    }
    function login()
    {


        $query = "select * from admin
        where admin_email='$this->admin_email' AND admin_password='$this->admin_password' ";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
        /*if ($data[0]['admin_id']) {
            $_SESSION['name'] = $data[0]['admin_name'];
            $_SESSION['admin_id'] = $data[0]['admin_id'];
            header("location:index.php");
        } else {
            $error = "invalid user!";
        }*/
    }
}
//*******************************************END ADMIN CLASS********************************************************** */

//*******************************************START VENDOR CLASS********************************************************** */
class Vendor extends dbconnection
{

    public $vendor_email;
    public $vendor_password;
    public $vendor_name;
    public $vendor_phone;
    public $vendor_trade;



    public function create()
    {
        $query = "INSERT INTO vendor(vendor_email,vendor_password,vendor_name,vendor_phone,trade_name)
				 VALUES('$this->vendor_email','$this->vendor_password','$this->vendor_name','$this->vendor_phone','$this->vendor_trade')";
        $this->performQuery($query);
    }

    public function readAll()
    {
        $query  = "SELECT * FROM vendor";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function readById($id)
    {
        $query  = "SELECT * FROM vendor WHERE vendor_id = $id";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function update($id)
    {


        if (isset($this->vendor_password)) {

            $query = " UPDATE vendor SET vendor_email    = '$this->vendor_email',
								    vendor_name     = '$this->vendor_name',
								    vendor_password     = '$this->vendor_password',
								    vendor_phone     = '$this->vendor_phone',
								    trade_name     = '$this->vendor_trade'
                                   WHERE vendor_id = $id";
        } else {
            $query = " UPDATE vendor SET vendor_email    = '$this->vendor_email',
                vendor_name     = '$this->vendor_name',
                vendor_phone     = '$this->vendor_phone',
                trade_name     = '$this->vendor_trade'
               WHERE vendor_id = $id";
        }






        $this->performQuery($query);
    }
    public function delete($id)
    {

        //$id=$_GET['delete_id'];
        $query = "DELETE FROM vendor WHERE vendor_id =$id ";
        $this->performQuery($query);
    }
    function login()
    {


        $query = "select * from vendor
        where vendor_email='$this->vendor_email' AND vendor_password='$this->vendor_password' ";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
        /*if ($data[0]['admin_id']) {
            $_SESSION['name'] = $data[0]['admin_name'];
            $_SESSION['admin_id'] = $data[0]['admin_id'];
            header("location:index.php");
        } else {
            $error = "invalid user!";
        }*/
    }
}
//*******************************************END VENDOR CLASS********************************************************** */

//*******************************************START CUSTOMER CLASS********************************************************** */
class Customer extends dbconnection
{

    public $customer_email;
    public $customer_password;
    public $customer_name;
    public $customer_phone;
    public $customer_address;



    public function create()
    {
        $query = "INSERT INTO customer(cust_email,cust_password,cust_name,mobile,address)
				 VALUES('$this->customer_email','$this->customer_password','$this->customer_name','$this->customer_phone','$this->customer_address')";
        $this->performQuery($query);
    }

    public function readAll()
    {
        $query  = "SELECT * FROM customer";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function readById($id)
    {
        $query  = "SELECT * FROM customer WHERE cust_id = $id";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function update($id)
    {
        if (isset($this->customer_password)) {

            $query = " UPDATE customer SET cust_email    = '$this->customer_email',
								       cust_name         = '$this->customer_name',
								       cust_password     = '$this->customer_password',
								       mobile            = '$this->customer_phone',
								       address           = '$this->customer_address'
								   WHERE cust_id         = $id";
        } else {
            $query = " UPDATE customer SET cust_email    = '$this->customer_email',
            cust_name                                    = '$this->customer_name',
            mobile                                       = '$this->customer_phone',
            address                                      = '$this->customer_address'
        WHERE cust_id                                    = $id";
        }
        $this->performQuery($query);
    }
    public function delete($id)
    {

        //$id=$_GET['delete_id'];
        $query = "DELETE FROM customer WHERE cust_id =$id ";
        $this->performQuery($query);
    }
    function login()
    {


        $query = "select * from customer
        where cust_email='$this->customer_email' AND cust_password='$this->customer_password' ";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
        /*if ($data[0]['admin_id']) {
            $_SESSION['name'] = $data[0]['admin_name'];
            $_SESSION['admin_id'] = $data[0]['admin_id'];
            header("location:index.php");
        } else {
            $error = "invalid user!";
        }*/
    }
}
//*******************************************END CUSTOMER CLASS********************************************************** */

//*******************************************START CATEGORY CLASS********************************************************** */
class category extends dbconnection
{
    public $cat_name;
    public $cat_desc;
    public $cat_image;

    public function create()
    {
        $query = "INSERT INTO category(cat_name,cat_desc,cat_image)
				 VALUES('$this->cat_name','$this->cat_desc','$this->cat_image')";
        $this->performQuery($query);
    }

    public function readAll()
    {
        $query  = "SELECT * FROM category";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function readRand()
    {
        $query  = "SELECT * FROM category ORDER BY RAND()";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function readGrid()
    {
        $query  = "SELECT * FROM category order BY rand() LIMIT 8";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function readById($id)
    {
        $query  = "SELECT * FROM category WHERE cat_id = $id";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function update($id)
    {

        if (empty($this->cat_image)) {


            $query = "UPDATE category SET cat_name    = '$this->cat_name',
								      cat_desc    = '$this->cat_desc'
								   WHERE cat_id = $id";
        } else {


            $query = "UPDATE category SET cat_name    = '$this->cat_name',
								      cat_desc    = '$this->cat_desc',
								      cat_image   = '$this->cat_image'
								   WHERE cat_id = $id";
        }

        $this->performQuery($query);
    }
    public function delete($id)
    {
        $query = "DELETE FROM category WHERE cat_id = $id";
        $this->performQuery($query);
    }
}
//*******************************************END CATEGORY CLASS********************************************************** */

//*******************************************START PRODUCT CLASS********************************************************** */
class Product extends category
{
    public $pro_name;
    public $pro_desc;
    public $pro_image;
    public $cat_id;
    public $pro_price;
    public $vendor_id;
    public $qty;


    public function create()
    {
        $query = "INSERT INTO product(pro_name,pro_desc,pro_image,pro_price,cat_id,qty,vendor_id)
				 VALUES('$this->pro_name','$this->pro_desc','$this->pro_image','$this->pro_price','$this->cat_id','$this->qty','$this->vendor_id')";
        $this->performQuery($query);
    }

    public function readAll()
    {
        $query  = "select product.pro_id,product.pro_name, product.pro_desc ,product.cat_id,product.vendor_id,
        product.pro_image,product.pro_price,product.qty,
         category.cat_name,vendor.vendor_name
        FROM product
        INNER JOIN category ON product.cat_id=category.cat_id
        LEFT JOIN vendor on product.vendor_id = vendor.vendor_id
        ORDER BY rand()
        ";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function readAllNotRand()
    {
        $query  = "select product.pro_id,product.pro_name, product.pro_desc ,product.cat_id,product.vendor_id,
        product.pro_image,product.pro_price,product.qty,
         category.cat_name,vendor.vendor_name
        FROM product
        INNER JOIN category ON product.cat_id=category.cat_id
        LEFT JOIN vendor on product.vendor_id = vendor.vendor_id
        ";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function readById($id)
    {
        $query  = "select product.pro_id,product.pro_name, product.pro_desc ,product.cat_id,product.vendor_id,
        product.pro_image,product.pro_price,product.qty,
         category.cat_name,vendor.vendor_name,vendor.trade_name
        FROM product
        INNER JOIN category ON product.cat_id=category.cat_id
        LEFT JOIN vendor on product.vendor_id = vendor.vendor_id
        WHERE pro_id=$id";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function update($id)
    {

        if (empty($this->pro_image)) {


            $query = "UPDATE product SET pro_name    = '$this->pro_name',
								      pro_desc       = '$this->pro_desc',
                                      pro_price      ='$this->pro_price',
                                      cat_id         ='$this->cat_id'
								   WHERE pro_id      = $id";
        } else {
            $query = "UPDATE product SET pro_name    = '$this->pro_name',
                                    pro_desc         = '$this->pro_desc',
                                    pro_price        ='$this->pro_price',
                                    cat_id           ='$this->cat_id',
                                    pro_image        = '$this->pro_image'
                                 WHERE pro_id        = $id";
        }

        $this->performQuery($query);
    }
    public function Vendorupdate($id)
    {


        if (empty($this->pro_image)) {


            $query = "UPDATE product SET pro_name    = '$this->pro_name',
								      pro_desc       = '$this->pro_desc',
                                      pro_price      ='$this->pro_price',
                                      cat_id         ='$this->cat_id'
								   WHERE pro_id      = $id";
        } else {
            $query = "UPDATE product SET pro_name    = '$this->pro_name',
                                    pro_desc         = '$this->pro_desc',
                                    pro_price        ='$this->pro_price',
                                    cat_id           ='$this->cat_id',
                                    pro_image        = '$this->pro_image'
                                 WHERE pro_id        = $id";
        }


        $this->performQuery($query);
    }
    public function delete($id)
    {
        $query = "DELETE FROM product WHERE pro_id = $id";
        $this->performQuery($query);
    }
    public function readByCat($id)
    {
        $query  = "SELECT * FROM product WHERE cat_id = $id";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function readByName($name)
    {
        $query  = "SELECT * FROM product WHERE pro_name = '$name'";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function readByVendor($id)
    {
        $query  = "select product.pro_id,product.pro_name, product.pro_desc ,product.cat_id,product.vendor_id,
        product.pro_image,product.pro_price,product.qty,
         category.cat_name
        FROM product
        INNER JOIN category ON product.cat_id=category.cat_id
        WHERE vendor_id=$id";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
}
//*******************************************END PRODUCT CLASS********************************************************** */

//*******************************************START ORDERS CLASS********************************************************** */
class order extends dbconnection
{

    public $id;



    public function create()
    {
        $query = "insert into orders(cust_id)
        values($this->id)";
        $this->performQuery($query);
    }

    public function readAll()
    {
        $query  = "SELECT * FROM orders";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function readById($id)
    {
        $query  = "SELECT * FROM orders WHERE cust_id = $id";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function readByOrderId($id)
    {
        $query  = "SELECT * FROM orders WHERE order_id = $id";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function delete($id)
    {

        //$id=$_GET['delete_id'];
        $query = "DELETE FROM order WHERE order_id =$id ";
        $this->performQuery($query);
    }
}
class order_details extends dbconnection
{
    public function readAll()
    {
        $query  = "SELECT * FROM order_details";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function readById($id)
    {
        $query  = "SELECT * FROM order_details WHERE order_id = $id";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
    public function readByVendorId($id)
    {
        $query  = "SELECT * FROM order_details WHERE vendor_id = $id";
        $result = $this->performQuery($query);
        return $this->fetchAll($result);
    }
}
//*******************************************END ORDERS CLASS********************************************************** */
