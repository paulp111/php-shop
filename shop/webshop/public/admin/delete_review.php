<?php
require '../../config/database.php';
require '../../src/classes/Review.php';

$reviewObj = new Review($pdo);

$review_id = $_GET['id'] ?? null;
if ($review_id) {
    $reviewObj->deleteReview($review_id);
}

header('Location: reviews.php');
exit();
?>
