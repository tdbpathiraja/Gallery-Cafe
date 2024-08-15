<?php
session_start();

include '../db-connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $username = $_SESSION['username'];
  $hall_category = $_POST['hall_category'];
  $arrival_time = $_POST['arrival_time'];
  $leave_time = $_POST['leave_time'];
  $booked_date = $_POST['booked_date'];
  $participant_count = $_POST['participant_count'];
  $message = $_POST['message'];
  $booking_id = uniqid('bookinghall_');


  $stmt = $conn->prepare("INSERT INTO hall_reservations (username, hall_category, arrival_time, planned_leave_time, booked_date, participant_count, message, booking_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssss", $username, $hall_category, $arrival_time, $leave_time, $booked_date, $participant_count, $message, $booking_id);

  
  if ($stmt->execute()) {
    echo "New Hall Booking Request Created Successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  
  $stmt->close();
  $conn->close();
}
?>
