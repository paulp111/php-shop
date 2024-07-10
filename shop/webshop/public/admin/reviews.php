<?php
require '../../config/database.php';
require '../../src/classes/Review.php';

$reviewObj = new Review($pdo);
$reviews = $reviewObj->getAllReviews();
?>
<!DOCTYPE html>
<html lang="de" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Reviews</title>
    <link rel="stylesheet" href="/webshop/public/css/pico.classless.min.css">
</head>
<body>
    <?php include 'header.admin.php'; ?>
    <main class="container">
        <h2>Manage Reviews</h2>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>User</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($review['product_name']); ?></td>
                        <td><?php echo htmlspecialchars($review['username']); ?></td>
                        <td><?php echo htmlspecialchars($review['rating']); ?></td>
                        <td><?php echo htmlspecialchars($review['comment']); ?></td>
                        <td>
                            <a href="delete_review.php?id=<?php echo $review['id']; ?>" onclick="return confirm('Are you sure you want to delete this review?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <?php include '../../includes/footer.php'; ?>
</body>
</html>
