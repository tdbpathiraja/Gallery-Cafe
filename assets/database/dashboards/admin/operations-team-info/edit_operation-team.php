<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teamMemberId = $_POST['team_member_id'];
    $name = $_POST['edit_name'];
    $email = $_POST['edit_email'];
    $username = $_POST['edit_username'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if (!empty($newPassword) && !empty($confirmPassword)) {
        
        if ($newPassword !== $confirmPassword) {
            $_SESSION['error'] = "Passwords do not match.";
            header("Location: ../../../../../control-dashboards/admin/dashboard/manage-operation-team.php");
            exit();
        }

        
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        
        $query = "UPDATE operations_team_users SET name = ?, email = ?, username = ?, password = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssi', $name, $email, $username, $hashedPassword, $teamMemberId);
    } else {
       
        $query = "UPDATE operations_team_users SET name = ?, email = ?, username = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssi', $name, $email, $username, $teamMemberId);
    }

    if ($stmt->execute()) {
        $_SESSION['promosuccess'] = "Team member updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update team member.";
    }

    $stmt->close();

    header('Location: ../../../../../control-dashboards/admin/dashboard/manage-operation-team.php');
    exit();
}
?>
