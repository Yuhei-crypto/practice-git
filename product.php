<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

require_once "Product.php";

if(isset($_POST['add_product'])) {
    $product = new Product();
    $product->addProduct($_POST['product_name'], $_POST['price'], $_POST['quantity']);
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Product</title></head>
<body>
    <h2>Add Product</h2>
    <form method="POST" action="">
        Product Name: <input type="text" name="product_name" required><br><br>
        Price: <input type="number" step="0.01" name="price" required><br><br>
        Quantity: <input type="number" name="quantity" required><br><br>
        <button type="submit" name="add_product">Save Product</button>
    </form>
    <p><a href="dashboard.php">Back to Dashboard</a></p>
</body>
</html>