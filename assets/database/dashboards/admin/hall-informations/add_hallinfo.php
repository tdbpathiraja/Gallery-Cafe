<?php
session_start();

include '../../../db-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['name'];
    $seating = $_POST['seating'];
    $description = $_POST['description'];

    // File upload handling
    $targetDir = "../../../../img/booking/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Validate image file
    $allowTypes = array('jpg', 'jpeg', 'png', 'gif', 'svg');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            
            $query = "INSERT INTO event_hall_info (category_name, seating_capacity, image, description) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssss", $title, $seating, $fileName, $description);
            $stmt->execute();
            $stmt->close();

            header("Location: ../../../../../control-dashboards/admin/dashboard/update-hallinfo.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, GIF, SVG files are allowed.";
    }
}
?>

