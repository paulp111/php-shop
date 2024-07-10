<?php
require '../../config/database.php';
require '../../src/classes/Product.php';

$productObj = new Product($pdo);

$product_id = $_GET['id'] ?? null;
if (!$product_id) {
    header('Location: products.php');
    exit();
}

$product = $productObj->getProductById($product_id);
if (!$product) {
    echo "Product not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    $productObj->updateProduct($product_id, $name, $description, $price, $image_url);

    header('Location: products.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="de" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Product</title>
    <link rel="stylesheet" href="/webshop/public/css/pico.classless.min.css">
</head>
<body>
    <?php include '../../includes/header.php'; ?>
    <main class="container">
        <h2>Edit Product</h2>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea>

            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>

            <label for="image_url">Image URL:</label>
            <input type="text" id="image_url" name="image_url" value="<?php echo htmlspecialchars($product['image_url']); ?>" required>

            <button type="submit">Save Changes</button>
        </form>
    </main>
    <?php include '../../includes/footer.php'; ?>
</body>
</html>
