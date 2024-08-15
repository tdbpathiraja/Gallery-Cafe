<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemId = $_POST['tableinfo_id'];

    // Delete the Table Category from the database
    $query = "DELETE FROM tables_info WHERE table_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $itemId);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Table Category deleted successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete Table Category.";
    }

    header('Location: ../../../../../control-dashboards/admin/dashboard/update-tableinfo.php');
    exit();
}
?>
