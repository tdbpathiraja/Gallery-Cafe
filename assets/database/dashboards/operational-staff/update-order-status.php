<?php
include '../../db-connection.php';
require '../../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

function sendStatusUpdateEmail($email, $username, $preorder_id, $new_status) {
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'tdbpathiraja@gmail.com';
    $mail->Password = 'jhgnzjzmywosbejj';   
    $mail->SMTPSecure = 'tls';  
    $mail->Port = 587; 

    $mail->setFrom('info@gallerycafe.com', 'Gallery Cafe Resturant');
    $mail->addAddress($email); 
    $mail->isHTML(true); 

    $mail->Subject = 'Order Status Updated';

$mail->Body    = "
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }
        .header {
            text-align: center;
            background-color: #ff6347; /* Tomato color */
            padding: 10px 0;
            border-radius: 10px 10px 0 0;
            color: #ffffff;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #777777;
        }
        .button {
            background-color: #ff6347;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #e5533d;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>Order Status Update</h1>
        </div>
        <div class='content'>
            <p>Dear $username,</p>
            <p>Your order with ID <strong>$preorder_id</strong> has been updated to: <strong>$new_status</strong>.</p>
            <p>Thank you for choosing our restaurant!</p>
            <p><a href='http://localhost/Gallery%20Cafe/pages/account/my-account.php' class='button'>View Order</a></p>
        </div>
        <div class='footer'>
            <p>&copy; Gallery Cafe. All rights reserved.</p>
        </div>
    </div>
</body>
</html>";

// $mail->AltBody = "Dear $username,\nYour order with ID $preorder_id has been updated to: $new_status.\nThank you for choosing our restaurant!\nVisit http://localhost/Gallery%20Cafe/pages/account/my-account.php to view your order.";

    if (!$mail->send()) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $preorder_id = $_POST['preorder_id'];
    $new_status = $_POST['order_status'];

    $query = "UPDATE pre_orders SET order_status = ? WHERE preorder_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $new_status, $preorder_id);

    if ($stmt->execute()) {
        // Fetch the relevant user's email
        $userQuery = "SELECT u.email, u.username FROM users u JOIN pre_orders p ON u.username = p.username WHERE p.preorder_id = ?";
        $userStmt = $conn->prepare($userQuery);
        $userStmt->bind_param("s", $preorder_id);
        $userStmt->execute();
        $userStmt->bind_result($email, $username);
        $userStmt->fetch();

        // Send email notification
        sendStatusUpdateEmail($email, $username, $preorder_id, $new_status);

        // Reload
        header('Location: ../../../../control-dashboards/operational_staff/dashboard/operation_dashboard.php');
        exit();
    } else {
        // Handle error
        echo "Error updating order status.";
    }
}
?>
