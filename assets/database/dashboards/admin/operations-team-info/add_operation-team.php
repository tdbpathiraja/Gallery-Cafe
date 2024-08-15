<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: ../../../../../control-dashboards/admin/dashboard/manage-operation-team.php");
        exit();
    }

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
    $query = "INSERT INTO operations_team_users (name, email, username, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("ssss", $name, $email, $username, $hashed_password);
        if ($stmt->execute()) {
            $_SESSION['success'] = "New operations team member added successfully.";
        } else {
            $_SESSION['error'] = "Failed to add new operations team member.";
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = "Database error: Unable to prepare statement.";
    }

    header("Location: ../../../../../control-dashboards/admin/dashboard/manage-operation-team.php");
    exit();
}
?>
