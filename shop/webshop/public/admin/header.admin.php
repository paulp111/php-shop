<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../../config/database.php';

$totalItemsInCart = 0;

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    $user_id = $_SESSION['user_id'];
    $cartStmt = $pdo->prepare("SELECT SUM(product_id) as total_quantity FROM carts WHERE user_id = :user_id");
    $cartStmt->execute([':user_id' => $user_id]);
    $cartResult = $cartStmt->fetch(PDO::FETCH_ASSOC);
    $totalItemsInCart = $cartResult['total_quantity'] ?? 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Webshop</title>
    <link rel="stylesheet" href="/webshop/public/css/pico.classless.min.css">
    <script src="/webshop/public/js/theme-toggle.js"></script>
    <style>
        .theme-switch-wrapper {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .theme-switch {
            display: inline-block;
            width: 34px;
            height: 20px;
            position: relative;
        }

        .theme-switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:checked + .slider:before {
            transform: translateX(14px);
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
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="/webshop/public/admin/index.php">Admin Home</a></li>
                <li><a href="/webshop/public/index.php">Home</a></li>
                <li><a href="/webshop/public/admin/products.php">Edit/Delete Products</a></li>
                <li><a href="/webshop/public/admin/reviews.php">Delete reviews</a></li>
                <li><a href="/webshop/public/views/user.view.php">Users</a></li>
                <li><a href="/webshop/public/admin/stats.php">Statistics</a></li>
                <?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                    echo '<li><a href="#">' . $_SESSION['username'] . '</a></li>';
                    echo '<li><a href="/webshop/public/views/layouts/logout.main.php">Logout</a></li>';
                } else {
                    echo '<li><a href="/webshop/public/views/login.view.php">Login</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
