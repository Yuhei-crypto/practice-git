<?php
session_start();
// if(!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit;
// }

require_once "../classes/Product.php";
$product_obj = new Product();
$products = $product_obj->getAllProducts();
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p><a href="logout.php">Logout</a></p>

    <h3>Product List</h3>
    <p><a href="add_product.php"><button>+ Add New Product</button></a></p> [cite: 13, 41]

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        <?php foreach($products as $p): ?> [cite: 14, 42]
        <tr>
            <td><?php echo $p['id']; ?></td>
            <td><?php echo $p['product_name']; ?></td>
            <td>$<?php echo number_format($p['price'], 2); ?></td>
            <td><?php echo $p['quantity']; ?></td>
            <td>
                <a href="edit_product.php?id=<?php echo $p['id']; ?>">Edit</a> |  [cite: 15, 43]
                <a href="delete_product.php?id=<?php echo $p['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a> | [cite: 15, 43]
                <?php if($p['quantity'] > 0): ?> [cite: 19, 47]
                    <a href="buy_product.php?id=<?php echo $p['id']; ?>">Buy</a> [cite: 20, 48]
                <?php else: ?>
                    <span style="color:red;">Out of Stock</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>