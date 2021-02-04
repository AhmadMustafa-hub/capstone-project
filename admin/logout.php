<?php
session_start();
    unset($_SESSION['admin_id']);
    unset($_SESSION['email']);
    unset($_SESSION['name']);
    header("location:login.php");
