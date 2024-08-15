<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemId = $_POST['chef_id'];

    // Delete the Image from the database
    $query = "DELETE FROM chefs WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $itemId);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Chef Details Delete Successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete chef details.";
    }

    header('Location: ../../../../../control-dashboards/admin/dashboard/update-chefs.php');
    exit();
}
?>
