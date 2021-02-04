<?php
session_start();
 unset($_SESSION['email']);
 unset($_SESSION['cust_name']);
 unset($_SESSION['cust_id']);
 unset($_SESSION['cart']);
 header("location:index.php");