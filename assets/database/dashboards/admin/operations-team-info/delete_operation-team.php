<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemId = $_POST['operationmember_id'];

    // Delete the Team Member from the database
    $query = "DELETE FROM operations_team_users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $itemId);

    if ($stmt->execute()) {
        $_SESSION['teamopsuccess'] = "User deleted successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete user.";
    }

    header('Location: ../../../../../control-dashboards/admin/dashboard/manage-operation-team.php');
    exit();
}
?>
