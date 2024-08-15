<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eventId = $_POST['event_id'];
    $title = $_POST['edit_name'];
    $date = $_POST['edit_date'];
    $time = $_POST['edit_time'];
    $location = $_POST['edit_location'];
    $description = $_POST['edit_description'];
    
    // Check if a new image file is uploaded
    if ($_FILES["new_image"]["size"] > 0) {
        $targetDir = "../../../../img/special-events/";
        $fileName = basename($_FILES["new_image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Check if file type is allowed
        $allowTypes = array('jpg', 'jpeg', 'png', 'gif', 'svg');
        if (in_array($fileType, $allowTypes)) {
            
            if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $targetFilePath)) {
                
                $query = "UPDATE special_events SET title = ?, date = ?, time = ?, location = ?, description = ?, image = ? WHERE id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('ssssssi', $title, $date, $time, $location, $description, $fileName, $eventId);

                if ($stmt->execute()) {
                    $_SESSION['eventsuccess'] = "Event updated successfully.";
                } else {
                    $_SESSION['error'] = "Failed to update Event.";
                }
            } else {
                $_SESSION['error'] = "Sorry, there was an error uploading your file.";
            }
        } else {
            $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
        }
    } else {
        // Update the event in the database without changing image
        $query = "UPDATE special_events SET title = ?, date = ?, time = ?, location = ?, description = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssssi', $title, $date, $time, $location, $description, $eventId);

        if ($stmt->execute()) {
            $_SESSION['eventsuccess'] = "Event updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update event.";
        }
    }

    header('Location: ../../../../../control-dashboards/admin/dashboard/update-specialevents.php');
    exit();
}
?>