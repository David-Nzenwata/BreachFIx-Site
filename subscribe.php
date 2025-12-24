<?php
// Include PHPMailer classes (adjust the path if needed)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];  // Get the email from the form

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();                                        // Use SMTP
        $mail->Host = 'smtp.gmail.com';                         // Gmail SMTP server
        $mail->SMTPAuth = true;                                 // Enable SMTP authentication
        $mail->Username = 'nzenwatadavid7@gmail.com';               // Your Gmail address
        $mail->Password = 'Davidking@1';                  // Your Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Encryption type
        $mail->Port = 587;                                      // SMTP port for TLS

        // Email setup
        $mail->setFrom('your-email@gmail.com', 'Your Name');    // Sender details
        $mail->addAddress('nzenwatadavid7@gmail.com');              // Recipient (you can put your own email)
        $mail->Subject = 'New Newsletter Subscriber';
        $mail->Body = "You have a new subscriber: $email";

        // Send the email
        $mail->send();
        echo "Subscription successful! A notification has been sent to your email.";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
$mail->SMTPDebug = 2; // Show debug output
$mail->Debugoutput = 'html'; // Show it in HTML format
