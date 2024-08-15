<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemId = $_POST['event_id'];

    // Delete the event from the database
    $query = "DELETE FROM special_events WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $itemId);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Event deleted successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete Event.";
    }

    header('Location: ../../../../../control-dashboards/admin/dashboard/update-specialevents.php');
    exit();
}
?>
