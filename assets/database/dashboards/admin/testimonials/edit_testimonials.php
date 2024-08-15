<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $testimonialId = $_POST['testimonial_id'];
    $title = $_POST['edit_name'];
    $position = $_POST['edit_position'];
    $description = $_POST['edit_description'];
    
    // Check if a new image file is uploaded
    if ($_FILES["new_image"]["size"] > 0) {
        $targetDir = "../../../../img/testimonials/";
        $fileName = basename($_FILES["new_image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg','jpeg','png','gif', 'svg');
        if(in_array($fileType, $allowTypes)){
            
            if(move_uploaded_file($_FILES["new_image"]["tmp_name"], $targetFilePath)){
                
                $query = "UPDATE testimonials SET author = ?, position = ?, quote = ?, image = ? WHERE id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('ssssi', $title, $position, $description, $fileName, $testimonialId);

                if ($stmt->execute()) {
                    $_SESSION['testisuccess'] = "Testimonial updated successfully.";
                } else {
                    $_SESSION['error'] = "Failed to update Testimonial.";
                }
            } else {
                $_SESSION['error'] = "Sorry, there was an error uploading your file.";
            }
        } else {
            $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
        }
    } else {
        // Update the testimonials in the database without changing image
        $query = "UPDATE testimonials SET author = ?, position = ?, quote = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssi', $title, $position, $description, $testimonialId);

        if ($stmt->execute()) {
            $_SESSION['testisuccess'] = "Testimonial updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update Testimonial.";
        }
    }

    header('Location: ../../../../../control-dashboards/admin/dashboard/update-testimonials.php');
    exit();
}
?>