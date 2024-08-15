<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['name'];
    $position = $_POST['position'];
    $description = $_POST['description'];

    // File upload handling
    $targetDir = "../../../../img/testimonials/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Validate image file
    $allowTypes = array('jpg', 'jpeg', 'png', 'gif', 'svg');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            
            $query = "INSERT INTO testimonials (author, position, quote, image) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssss", $title, $position, $description, $fileName);
            $stmt->execute();
            $stmt->close();

            header("Location: ../../../../../control-dashboards/admin/dashboard/update-testimonials.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
    }
}
?>

