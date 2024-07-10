<?php
session_start();

require '../../config/database.php';
require '../../src/vendor/autoload.php';
require '../../src/classes/Database.php';
require '../../src/classes/Product.php';

$db = new Database($config);
$pdo = $db->getConnection();

$productObj = new Product($pdo);
$topSellingProducts = $productObj->getTopSellingProducts();

include 'header.admin.php';
?>

<!DOCTYPE html>
<html lang="de" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Statistiken</title>
    <link rel="stylesheet" href="/webshop/public/css/pico.classless.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.colors.min.css">
    <script src="/webshop/public/js/theme-toggle.js"></script>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            color: var(--pico-color-pink-500);
        }

        tr:nth-child(even) {
            background-color: var(--pico-color-gray-100);
        }

        tr:hover {
            background-color: var(--pico-color-gray-300);
        }
    </style>
</head>

<body>
    <div class="theme-switch-wrapper">
        <label class="theme-switch">
            <input type="checkbox" id="theme-switch" onclick="toggleTheme()">
            <span class="slider"></span>
        </label>
    </div>
    <main class="container">
        <h2 class="pico-color-pink-500">Meistverkaufte Produkte</h2>
        <table>
            <thead>
                <tr>
                    <th>Produktname</th>
                    <th>Verkäufe</th>
                    <th>Bild</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($topSellingProducts as $product) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                        <td><?php echo htmlspecialchars($product['total_sold']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="width:50px;height:50px;"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <?php include '../../includes/footer.php'; ?>
</body>

</html>
