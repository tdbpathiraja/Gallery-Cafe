<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tableId = $_POST['tableinfo_id'];
    $title = $_POST['edit_name'];
    $seating = $_POST['edit_seating'];
    $totaltables = $_POST['edit_totaltables'];
    $description = $_POST['edit_description'];
    
    // Check if a new image file is uploaded
    if ($_FILES["new_image"]["size"] > 0) {
        $targetDir = "../../../../img/booking/";
        $fileName = basename($_FILES["new_image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Check if file type is allowed
        $allowTypes = array('jpg', 'jpeg', 'png', 'gif', 'svg');
        if (in_array($fileType, $allowTypes)) {
            
            if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $targetFilePath)) {
                
                $query = "UPDATE tables_info SET category_name = ?, seating_capacity = ?, total_count = ?, description = ?, image = ? WHERE table_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('sssssi', $title, $seating, $totaltables, $description, $fileName, $tableId);

                if ($stmt->execute()) {
                    $_SESSION['tablesuccess'] = "Table Category updated successfully.";
                } else {
                    $_SESSION['error'] = "Failed to update Table Category.";
                }
            } else {
                $_SESSION['error'] = "Sorry, there was an error uploading your file.";
            }
        } else {
            $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
        }
    } else {
        // Update the table category in the database without changing image
        $query = "UPDATE tables_info SET category_name = ?, seating_capacity = ?, total_count = ?, description = ? WHERE table_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssi', $title, $seating, $totaltables, $description, $tableId);

        if ($stmt->execute()) {
            $_SESSION['tablesuccess'] = "Table Category updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update Table Category.";
        }
    }

    header('Location: ../../../../../control-dashboards/admin/dashboard/update-tableinfo.php');
    exit();
}
?>
