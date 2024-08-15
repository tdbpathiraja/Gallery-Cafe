<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemId = $_POST['promotion_id'];

    // Delete the promotion from the database
    $query = "DELETE FROM promotions WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $itemId);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Promotion deleted successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete menu item.";
    }

    header('Location: ../../../../../control-dashboards/admin/dashboard/update-promotions.php');
    exit();
}
?>
