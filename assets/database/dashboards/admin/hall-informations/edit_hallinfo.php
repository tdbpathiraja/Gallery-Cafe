<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hallId = $_POST['hallinfo_id'];
    $title = $_POST['edit_name'];
    $seating = $_POST['edit_seating'];
    $description = $_POST['edit_description'];
    
    // Check if a new image file is uploaded
    if ($_FILES["new_image"]["size"] > 0) {
        $targetDir = "../../../../img/booking/";
        $fileName = basename($_FILES["new_image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg','jpeg','png','gif', 'svg');
        if (in_array($fileType, $allowTypes)) {
            
            if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $targetFilePath)) {
                
                $query = "UPDATE event_hall_info SET category_name = ?, seating_capacity = ?, description = ?, image = ? WHERE hall_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('ssssi', $title, $seating, $description, $fileName, $hallId);

                if ($stmt->execute()) {
                    $_SESSION['hallsuccess'] = "Hall Category updated successfully.";
                } else {
                    $_SESSION['error'] = "Failed to update Hall Category.";
                }
            } else {
                $_SESSION['error'] = "Sorry, there was an error uploading your file.";
            }
        } else {
            $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG, GIF, and SVG files are allowed.";
        }
    } else {
        // Update the hall category in the database without changing image
        $query = "UPDATE event_hall_info SET category_name = ?, seating_capacity = ?, description = ? WHERE hall_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssi', $title, $seating, $description, $hallId);

        if ($stmt->execute()) {
            $_SESSION['hallsuccess'] = "Hall Category updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update Hall Category.";
        }
    }

    header('Location: ../../../../../control-dashboards/admin/dashboard/update-hallinfo.php');
    exit();
}
?>