<?php
require '../../includes/functions.php';
require '../../config/database.php';
require '../../src/vendor/autoload.php';
require '../../src/classes/Database.php';

$db = new Database($config);
$pdo = $db->getConnection();

include 'header.admin.php';
?>
<!DOCTYPE html>
<html lang="de" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <link rel="stylesheet" href="/webshop/public/css/pico.classless.min.css">

    <main class="container">
        <h2>Welcome to the Admin Page</h2>
        <p>Here you can manage products and reviews.</p>
        <?php
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) { //this is a problem, anyone can access
            echo '<p>Welcome, ' . $_SESSION['username'] . '!</p>';
        }
        ?>
    </main>
    <?php include '../../includes/footer.php'; ?>
</body>

</html>
