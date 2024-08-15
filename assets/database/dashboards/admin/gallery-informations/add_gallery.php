<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['name'];

    // File upload handling
    $targetDir = "../../../../img/gallery/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Validate image file
    $allowTypes = array('jpg', 'jpeg', 'png', 'gif', 'svg');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            
            $query = "INSERT INTO gallery (alt_text, image_url) VALUES (?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $title, $fileName);
            $stmt->execute();
            $stmt->close();

            header("Location: ../../../../../control-dashboards/admin/dashboard/update-gallery.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
    }
}
?>

