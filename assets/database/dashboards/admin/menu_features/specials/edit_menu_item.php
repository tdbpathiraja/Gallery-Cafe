<?php
session_start();

include '../../../../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemId = $_POST['menu_item_id'];
    $name = $_POST['edit_name'];
    $category = $_POST['edit_category'];
    $price = $_POST['edit_price'];
    $description = $_POST['edit_description'];
    $ingredients = $_POST['edit_ingredients'];
    $time = $_POST['edit_time'];
    $persons = $_POST['edit_persons'];
    $cuisines = $_POST['edit_cuisines'];
    
    // Check if a new image file is uploaded
    if ($_FILES["new_image"]["size"] > 0) {
        $targetDir = "../../../../../img/menu/";
        $fileName = basename($_FILES["new_image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["new_image"]["tmp_name"]);
        if($check !== false) {
            // Allow certain file formats
            $allowTypes = array('jpg','jpeg','png','gif');
            if(in_array($fileType, $allowTypes)){
                
                if(move_uploaded_file($_FILES["new_image"]["tmp_name"], $targetFilePath)){
                    
                    $query = "UPDATE specialmeals SET name = ?, category = ?, price = ?, description = ?, ingredients = ?, time = ?, persons = ?, cuisines = ?, image_url = ? WHERE id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param('ssdsssissi', $name, $category, $price, $description, $ingredients, $time, $persons, $cuisines, $fileName, $itemId);

                    if ($stmt->execute()) {
                        $_SESSION['editsuccessmenu'] = "Menu item updated successfully.";
                    } else {
                        $_SESSION['editerrormenu'] = "Failed to update menu item.";
                    }
                } else {
                    $_SESSION['editerrormenu'] = "Sorry, there was an error uploading your file.";
                }
            } else {
                $_SESSION['editerrormenu'] = "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
            }
        } else {
            $_SESSION['editerrormenu'] = "File is not an image.";
        }
    } else {
        // Update the menu item in the database without changing image
        $query = "UPDATE specialmeals SET name = ?, category = ?, price = ?, description = ?, ingredients = ?, time = ?, persons = ?, cuisines = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssdsssisi', $name, $category, $price, $description, $ingredients, $time, $persons, $cuisines, $itemId);

        if ($stmt->execute()) {
            $_SESSION['editsuccessmenu'] = "Menu item updated successfully.";
        } else {
            $_SESSION['editerrormenu'] = "Failed to update menu item.";
        }
    }

    header('Location: ../../../../../../control-dashboards/admin/dashboard/special.php');
    exit();
}
?>


