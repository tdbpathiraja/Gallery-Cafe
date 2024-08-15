<?php
include '../../../db-connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $close_reason = $_POST['close_reason'];
    $display_message = isset($_POST['display_message']) ? 1 : 0;

    // Delete previous record
    $delete_sql = "DELETE FROM closure_info";
    $conn->query($delete_sql);

    
    $sql = "INSERT INTO closure_info (start_date, end_date, close_reason, display_message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $start_date, $end_date, $close_reason, $display_message);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
