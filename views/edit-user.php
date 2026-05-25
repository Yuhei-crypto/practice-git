<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

require_once "Product.php";
$product_obj = new Product();

$id = $_GET['id'];
$product = $product_obj->getProduct($id);

if(isset($_POST['update_product'])) {
    $product_obj->updateProduct($id, $_POST['product_name'], $_POST['price'], $_POST['quantity']);
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Product</title></head>
<body>
    <h2>Edit Product</h2>
    <form method="POST" action="">
        Product Name: <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" required><br><br>
        Price: <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required><br><br>
        Quantity: <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required><br><br>
        <button type="submit" name="update_product">Update Product</button>
    </form>
    <p><a href="dashboard.php">Back to Dashboard</a></p>
</body>
</html>