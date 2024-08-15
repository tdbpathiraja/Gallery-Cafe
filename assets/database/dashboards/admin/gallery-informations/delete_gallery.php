<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemId = $_POST['gallery_id'];

    // Delete the Image from the database
    $query = "DELETE FROM gallery WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $itemId);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Image Delete Successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete menu item.";
    }

    header('Location: ../../../../../control-dashboards/admin/dashboard/update-gallery.php');
    exit();
}
?>
