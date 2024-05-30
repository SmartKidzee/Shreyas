<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.your-email-provider.com'; // Update with your email provider's SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your-email@example.com'; // Update with your email address
        $mail->Password   = 'your-email-password'; // Update with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('your-email@example.com', 'Shreyas');
        $mail->addAddress('shreyas12.kidzee@gmail.com'); // Add your recipient email address

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Submission from Shreyas\' Tech Hub';
        $mail->Body    = "Name: $name<br>Email: $email<br>Message: $message";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header('Location: contact.html');
    exit();
}
?>
