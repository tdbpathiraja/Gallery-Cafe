<?php
session_start();

include '../../../../db-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $time = $_POST['time'];
    $persons = $_POST['persons'];
    $cuisines = $_POST['cuisines'];

    // File upload handling
    $targetDir = "../../../../../img/menu/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Validate image file
    $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            
            $query = "INSERT INTO beverages (name, category, price, image_url, description, ingredients, time, persons, cuisines) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssdssssis", $name, $category, $price, $fileName, $description, $ingredients, $time, $persons, $cuisines); // Use $fileName instead of $targetFilePath
            $stmt->execute();
            $stmt->close();

            header("Location: ../../../../../../control-dashboards/admin/dashboard/beverages.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
    }
}
?>
