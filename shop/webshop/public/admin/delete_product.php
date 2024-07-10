<?php
require '../../config/database.php';
require '../../src/classes/Product.php';

$productObj = new Product($pdo);

$product_id = $_GET['id'] ?? null;
if ($product_id) {
    $productObj->deleteProduct($product_id);
}

header('Location: products.php');
exit();
?>
