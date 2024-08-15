<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $promotionId = $_POST['promotion_id'];
    $title = $_POST['edit_name'];
    $description = $_POST['edit_description'];
    $terms = $_POST['edit_terms'];
    
    // Check if a new image file is uploaded
    if ($_FILES["new_image"]["size"] > 0) {
        $targetDir = "../../../../img/promotions/";
        $fileName = basename($_FILES["new_image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg','jpeg','png','gif', 'svg');
        if(in_array($fileType, $allowTypes)){
            
            if(move_uploaded_file($_FILES["new_image"]["tmp_name"], $targetFilePath)){
                
                $query = "UPDATE promotions SET title = ?, description = ?, terms = ?, image_url = ? WHERE id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('ssssi', $title, $description, $terms, $fileName, $promotionId);

                if ($stmt->execute()) {
                    $_SESSION['promosuccess'] = "Promotion updated successfully.";
                } else {
                    $_SESSION['error'] = "Failed to update promotion.";
                }
            } else {
                $_SESSION['error'] = "Sorry, there was an error uploading your file.";
            }
        } else {
            $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
        }
    } else {
        // Update the promotion in the database without changing image
        $query = "UPDATE promotions SET title = ?, description = ?, terms = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssi', $title, $description, $terms, $promotionId);

        if ($stmt->execute()) {
            $_SESSION['promosuccess'] = "Promotion updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update promotion.";
        }
    }

    header('Location: ../../../../../control-dashboards/admin/dashboard/update-promotions.php');
    exit();
}
?>