<?php
session_start();
 unset($_SESSION['vendor-email']);
 unset($_SESSION['vendor_name']);
 unset($_SESSION['vendor_id']);
 header("location:index.php");