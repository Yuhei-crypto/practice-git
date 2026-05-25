<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

require_once "Product.php";

if(isset($_GET['id'])) {
    $product = new Product();
    $product->deleteProduct($_GET['id']);
}

header("Location: dashboard.php");
exit;
?>