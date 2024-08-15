<?php
include '../db-connection.php';


$booked_date = $_POST['booked_date'];
$table_category = $_POST['table_category'];
$arrival_time = $_POST['arrival_time'];
$leave_time = $_POST['leave_time'];


$sql_total = "SELECT total_count FROM tables_info WHERE category_name = ?";
$stmt_total = $conn->prepare($sql_total);
$stmt_total->bind_param("s", $table_category);
$stmt_total->execute();
$result_total = $stmt_total->get_result();
$total_tables = $result_total->fetch_assoc()['total_count'];

$stmt_total->close();


$sql_booked = "SELECT COUNT(*) AS booked_count FROM table_reservations 
               WHERE table_category = ? AND booked_date = ? AND (
                   (arrival_time < ? AND planned_leave_time > ?) OR
                   (arrival_time < ? AND planned_leave_time > ?) OR
                   (arrival_time >= ? AND planned_leave_time < ?)
               )";
$stmt_booked = $conn->prepare($sql_booked);
$stmt_booked->bind_param("ssssssss", $table_category, $booked_date, $leave_time, $arrival_time, $leave_time, $arrival_time, $arrival_time, $leave_time);
$stmt_booked->execute();
$result_booked = $stmt_booked->get_result();
$booked_tables = $result_booked->fetch_assoc()['booked_count'];

$stmt_booked->close();

$conn->close();


if ($booked_tables < $total_tables) {
    echo 'available';
} else {
    echo 'unavailable';
}
?>
