<?php
session_start();
include '../db-connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_SESSION['username'] ?? '';
    $booked_date = $_POST['booked_date'] ?? '';
    $order_time = $_POST['order_time'] ?? '';
    $message = $_POST['message'] ?? '';
    $orderneed_time = $_POST['orderneed_time'] ?? '';
    $order_method = $_POST['order_method'] ?? '';
    $preorder_id = uniqid('PO_');

    
    $meal_details = '';

    
    $meal_categories = ['mainMeals', 'desserts', 'sideDishes', 'beverages'];
    foreach ($meal_categories as $category) {
        if (isset($_POST[$category])) {
            foreach ($_POST[$category] as $meal_id) {
                
                $qty_key = "qty_{$category}_{$meal_id}";
                $qty = $_POST[$qty_key] ?? 1; 

                
                $table = '';
                switch ($category) {
                    case 'mainMeals':
                        $table = 'menuitems';
                        break;
                    case 'desserts':
                        $table = 'desserts';
                        break;
                    case 'sideDishes':
                        $table = 'sidedishes';
                        break;
                    case 'beverages':
                        $table = 'beverages';
                        break;
                    default:
                        continue 2; 
                }

                
                $stmt = $conn->prepare("SELECT name FROM $table WHERE id = ?");
                $stmt->bind_param('i', $meal_id);
                $stmt->execute();
                $stmt->bind_result($meal_name);
                
                
                if ($stmt->fetch()) {
                    if (!empty($meal_details)) {
                        $meal_details .= ', ';
                    }
                    $meal_details .= "{$meal_name} - Qty: {$qty}";
                }

                $stmt->close();
            }
        }
    }

    $sql = "INSERT INTO pre_orders (preorder_id, username, meal_details, order_date, order_time, message, order_status, created_at, orderneed_time, order_method) 
            VALUES (?, ?, ?, ?, ?, ?, 'Pending', NOW(), ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $preorder_id, $username, $meal_details, $booked_date, $order_time, $message, $orderneed_time, $order_method);
    
    if ($stmt->execute()) {
        
        $_SESSION['message'] = "Order placed successfully!";
    } else {
        
        $_SESSION['message'] = "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    
    header("Location: ../../../pages/booking/pre-order.php");
    exit();
}
?>
