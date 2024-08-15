<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemId = $_POST['hallinfo_id'];

    // Delete the Hall Category from the database
    $query = "DELETE FROM event_hall_info WHERE hall_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $itemId);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Hall Category deleted successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete Hall Category.";
    }

    header('Location: ../../../../../control-dashboards/admin/dashboard/update-hallinfo.php');
    exit();
}
?>
