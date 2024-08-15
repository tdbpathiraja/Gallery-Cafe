<?php
session_start();
include '../db-connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $username = $_SESSION['username'];
  $table_category = $_POST['table_category'];
  $arrival_time = $_POST['arrival_time'];
  $leave_time = $_POST['leave_time'];
  $booked_date = $_POST['booked_date'];
  $message = $_POST['message'];
  $booking_id = uniqid('booking_');

  
  $stmt = $conn->prepare("INSERT INTO table_reservations (username, table_category, arrival_time, planned_leave_time, booked_date, message, booking_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssss", $username, $table_category, $arrival_time, $leave_time, $booked_date, $message, $booking_id);

  
  if ($stmt->execute()) {
    $_SESSION['success'] = "New reservation created successfully";
  } else {
    $_SESSION['error'] = "Error: " . $stmt->error;
  }

  
  $stmt->close();
  $conn->close();

  
  header("Location: ../../../pages/booking/table-reservation.php");
  exit();
}
?>