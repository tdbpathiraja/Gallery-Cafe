<?php
session_start();
include '../../db-connection.php';
require '../../../vendor/autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['booking_id'])) {
    $reservationId = $_POST['booking_id'];

    // Get the email of the user who placed the order
    $stmt = $conn->prepare(
        "SELECT u.email, u.username 
         FROM users u 
         JOIN table_reservations p ON u.username = p.username 
         WHERE p.booking_id = ?"
    );
    $stmt->bind_param("s", $reservationId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $userEmail = $user['email'];
        $username = $user['username'];

        // Send email notification
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tdbpathiraja@gmail.com';
            $mail->Password = 'jhgnzjzmywosbejj';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('noreply@gallerycafe.com', 'Gallery Cafe');
            $mail->addAddress($userEmail);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Table Reservation Deletion Notification';
            $mail->Body = "
            <!DOCTYPE html>
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        color: #333;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        width: 100%;
                        padding: 20px;
                        background-color: #ffffff;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        margin: 20px auto;
                        max-width: 600px;
                    }
                    .header {
                        background-color: #d42b19;
                        color: #ffffff;
                        padding: 10px 0;
                        text-align: center;
                    }
                    .content {
                        padding: 20px;
                    }
                    .footer {
                        background-color: #d42b19;
                        color: #ffffff;
                        text-align: center;
                        padding: 10px 0;
                        margin-top: 20px;
                    }
                    .button {
                        display: inline-block;
                        padding: 10px 20px;
                        font-size: 16px;
                        margin: 20px 0;
                        text-decoration: none;
                        color: #ffffff;
                        background-color: #4CAF50;
                        border-radius: 5px;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h1>Gallery Cafe</h1>
                    </div>
                    <div class='content'>
                        <p>Dear $username,</p>
                        <p>Your Table Reservation with ID <strong>$reservationId</strong> has been successfully deleted from our system.</p>
                        <p>Thank you,<br>Gallery Cafe</p>

                        <br><br>
                        <p>If you think this is a mistake or some technical error then please contact our staff immediately.</p>
                    </div>
                    <div class='footer'>
                        &copy; " . date('Y') . " Gallery Cafe. All rights reserved.
                    </div>
                </div>
            </body>
            </html>";

            $mail->send();

            $stmt = $conn->prepare("DELETE FROM table_reservations WHERE booking_id = ?");
            $stmt->bind_param("s", $reservationId);
            if ($stmt->execute()) {
                echo 'success';
            } else {
                echo 'error';
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'invalid_request';
    }
} else {
    echo 'invalid_request';
}
?>

