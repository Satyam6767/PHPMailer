<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['msg'];

    // Create an instance of PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                        // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                   // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                               // Enable SMTP authentication
        $mail->Username   = 'satyamkumar6767@gmail.com';             // SMTP username
        $mail->Password   = 'neer etfv llxl fknx';                    // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        // Enable implicit TLS encryption
        $mail->Port       = 465;                                // TCP port to connect to

        // Recipients
        $mail->setFrom('satyamkumar6767@gmail.com', 'Contact Form');
        $mail->addAddress('satyamsksk3@gmail.com', 'Website Admin');  

        // Content
        $mail->isHTML(true);                                    // Set email format to HTML
        $mail->Subject = 'Contact Form Submission';
        $mail->Body    = "Sender Name: $name <br> 
                          Sender Email: $email <br>
                          Sender Phone: $phone <br>
                          Message: $msg";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
