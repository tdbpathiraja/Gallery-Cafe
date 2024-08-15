<?php
session_start();

include '../../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemId = $_POST['menu_item_id'];

    // Delete the menu item from the database
    $query = "DELETE FROM beverages WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $itemId);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Menu item deleted successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete menu item.";
    }

    header('Location: ../../../../../../control-dashboards/admin/dashboard/beverages.php');
    exit();
}
?>
