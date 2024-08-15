<?php
session_start();
require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $_SESSION['error'] = 'All fields are required.';
        header('Location: ../../../contact.php');
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid email address.';
        header('Location: ../../../contact.php');
        exit();
    }

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'tdbpathiraja@gmail.com';              
        $mail->Password   = 'jhgnzjzmywosbejj';                  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;                                    

        //Recipients
        $mail->setFrom('from@example.com', 'Your Name');
        $mail->addAddress('your-email@example.com', 'Your Name');   

        // Content
        $mail->isHTML(true);                                      
        $mail->Subject = $subject;
        $mail->Body    = "<h1>Contact Form Submission</h1>
                          <p><strong>Name:</strong> {$name}</p>
                          <p><strong>Email:</strong> {$email}</p>
                          <p><strong>Subject:</strong> {$subject}</p>
                          <p><strong>Message:</strong><br>{$message}</p>";

        $mail->send();
        $_SESSION['success'] = 'Message has been sent';
    } catch (Exception $e) {
        $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    header('Location: ../../../contact.php');
} else {
    $_SESSION['error'] = 'Invalid request method.';
    header('Location: ../../../contact.php');
}

?>