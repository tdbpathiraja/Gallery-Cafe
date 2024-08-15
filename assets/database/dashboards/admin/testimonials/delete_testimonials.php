<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemId = $_POST['testimonials_id'];

    // Delete the promotion from the database
    $query = "DELETE FROM testimonials WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $itemId);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Testimonial deleted successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete Testimonial item.";
    }

    header('Location: ../../../../../control-dashboards/admin/dashboard/update-testimonials.php');
    exit();
}
?>
