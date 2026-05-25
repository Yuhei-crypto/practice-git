<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

require_once "Product.php";
$product_obj = new Product();

$id = $_GET['id'];
$product = $product_obj->getProduct($id);
?>
<!DOCTYPE html>
<html>
<head><title>Buy Product</title></head>
<body>
    <h2>Buy Product</h2>
    <p><strong>Product Name:</strong> <?php echo $product['product_name']; ?></p> [cite: 22, 50]
    <p><strong>Price:</strong> $<?php echo number_format($product['price'], 2); ?></p> [cite: 22, 50]
    <p><strong>Stock Available:</strong> <?php echo $product['quantity']; ?></p> [cite: 22, 50]

    <form method="POST" action="payment.php">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        
        Enter Quantity to Buy: 
        <input type="number" name="buy_quantity" min="1" max="<?php echo $product['quantity']; ?>" required><br><br> [cite: 23, 51]
        
        <button type="submit" name="go_to_payment">Proceed to Payment</button>
    </form>
    <p><a href="dashboard.php">Cancel</a></p>
</body>
</html>