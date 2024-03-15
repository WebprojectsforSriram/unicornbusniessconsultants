<?php
 
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
// Required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
 
// Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {
 
  $mail = new PHPMailer(true);
 
  // Server settings
  $mail->isSMTP();                              // Send using SMTP
  $mail->Host       = 'smtp.gmail.com';         // Set the SMTP server to send through
  $mail->SMTPAuth   = true;                      // Enable SMTP authentication
  $mail->Username   = 'vijayanandvj1998@gmail.com'; // SMTP email address
  $mail->Password   = 'fkpg xhni cnhj qxkj ';      // SMTP password
  $mail->SMTPSecure = 'ssl';                    // Enable implicit SSL encryption
  $mail->Port       = 465;                      // TCP port to connect to
 
  // Recipients
  $mail->setFrom('vijayanandvj1998@gmail.com', 'From Vijay'); // Set your email address and name as the sender
  $mail->addAddress('vijayanandextra@gmail.com'); // Set recipient email to vijayanandextra@gmail.com
  $mail->addReplyTo($_POST["email"], $_POST["name"]);        // Reply to sender email
 
  // Content
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $message = $_POST["message"];


  $mail->isHTML(true);              // Set email format to HTML
  $mail->Subject = "This is the mail generated from PHP Contact Form";   // Email subject
  $mail->Body = "
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Phone Number:</strong> $phone</p>
    <p><strong>Message:</strong> $message</p>
  "; // Email message
    

        
  // Send email
  if ($mail->send()) {
    echo "<script>alert('Message was sent successfully!'); document.location.href = 'index.html';</script>";
  } else {
    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
  }
}
?>

<!-- https://localhost/php-contact-form/index.php -->